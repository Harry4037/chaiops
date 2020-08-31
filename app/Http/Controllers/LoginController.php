<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Register;
use App\Mail\Forgot;
use Illuminate\Support\Str;

class LoginController extends Controller {

    public function index(Request $request) {

        return view('home.index');
    }

    public function signin(Request $request) {

        return view('home.signin');
    }

    public function signup(Request $request) {

        return view('home.signin');
    }

    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
                    'email' => [
                        'required',
                    ],
                    'password' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $isEmail = filter_var($request->email, FILTER_VALIDATE_EMAIL);
        if ($isEmail) {
            $request->merge(["user_role_id" => 3]);
            $credentials = $request->only('email', "password", 'user_role_id');
        } else {
            $credentials = [
                "phone_number" => $request->email,
                "password" => $request->password,
                "user_role_id" => 3,
            ];
        }

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route("site.index");
        }
        return redirect()->back()->withErrors("Opps!! Your Email address or password is incorrect.");
    }

    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
                    'name' => ['required'],
                    'email' => [
                        'required',
                        'email',
                        Rule::unique(User::class, 'email')->where(function ($query) use($request) {
                                    return $query->where(['email' => $request->input('email'), "user_role_id" => 3]);
                                }),
                    ],
                    'password' => ['required', 'min:4', 'confirmed'],
                    'password_confirmation' => ['required', 'min:4'],
                    'phone_number' => ['required'],
        ]);
        $request->merge(["user_role_id" => 3]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create(request(['name', 'email', 'phone_number', 'password', 'user_role_id']));

        // try {

        //     Mail::to($user->email)->send(new Register($user->email));
        // } catch (\Exception $e) {
            
        // }

        auth()->login($user);

        return redirect()->to('/');
    }

    public function logout() {
        auth()->logout();

        return redirect()->to('/');
    }

    public function resetPassword(Request $request, $code = NULL) {

        if ($request->isMethod("post")) {
            $validator = Validator::make($request->all(), [
                        'password' => ['required', 'min:4', 'confirmed'],
                        'password_confirmation' => ['required', 'min:4'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($code) {
                $user = User::where('reset_code', $code)->first();
                if ($user) {

                    $user->password = $request->password;
                    $user->reset_code = NULL;
                    if ($user->save()) {
                        return redirect()->route('site.index')->with('success', "Password has been successfully changed.");
                    }
                } else {
                    return redirect()->route('site.index')->with('error', "Invalid Link.");
                }
            } else {
                return redirect()->route('site.index');
            }
        }

        return view('home.reset')->with('error', "Invalid Link.");
    }

    public function forgotPassword(Request $request) {

        if ($request->isMethod("post")) {
            $validator = Validator::make($request->all(), [
                        'email' => [
                            'required',
                            'email',
                        ],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user = User::where('email', $request->email)->first();

            if ($user) {
                $random_string = Str::random(10);
                $user->reset_code = $random_string;
                if ($user->save()) {
                    try {
                        Mail::to($user->email)->send(new Forgot($user->reset_code));
                    } catch (\Exception $e) {
                        
                    }
                }

                return redirect()->route('site.index')->with('error', "Reset Password Link  has been Sent to the Email.");
            } else {
                return redirect()->route('site.index')->withErrors("Something went be wrong.")->withInput();
            }
        }

        return view('home.forgot');
    }

}
