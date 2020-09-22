<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Franchise;
use App\Models\Order;
use App\Models\User;
use App\Models\Contact;
use App\Models\Store;
use Illuminate\Support\Facades\Mail;
use App\Mail\Book;
use Validator;
use session;

class HomeController extends Controller {

    public function index(Request $request) {

        if (session()->get('cart') and auth()->check()) {
            $user = auth()->user();
            foreach (session('cart') as $id => $product) {

                $check_product = Cart::where('product_id', $id)->where('user_id', $user->id)->first();
                if ($check_product) {
                    $check_product->quantity = $product['quantity'];
                    $check_product->save();
                } else {
                    $cart = new Cart();
                    $cart->user_id = $user->id;
                    $cart->product_id = $id;
                    $cart->quantity = $product['quantity'];
                    $cart->save();
                }
            }
        }

        $products = Product::where(["is_active" => 1])->get();
        $categories = Category::where(["is_active" => 1])->with(['product' => function($query) {
                        $query->where("is_active", 1);
                    }])->get();
        return view('home.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    public function aboutPage() {
        return view('home.about');
    }

    public function menuPage() {
        $categories = Category::where(["is_active" => 1])->with(['product' => function($query) {
                        $query->where("is_active", 1);
                    }])->get();
        return view('home.menu', [
            "categories" => $categories
        ]);
    }

    public function storePage() {
        return view('home.shop');
    }

    public function contactPage() {
        return view('home.contact');
    }

    public function cartPage() {
        if (auth()->check()) {
            $cartItems = Cart::with('product')->where(["user_id" => auth()->user()->id])->get();
        } else {
            $cartItems = Cart::with('product')->where(["session_id" => session()->getId()])->get();
        }

        return view('home.cart', [
            "cartItems" => $cartItems
        ]);
    }

    public function franchise() {
        return view('home.franchise');
    }

    public function storeList() {
        $stores = Store::where('is_active',1)->get();
        return view('home.store-locator', [
            "stores" => $stores
        ]);
    }

    public function dashboard(Request $request) {
        if (auth()->check()) {
        $orders = Order::where('user_id', auth()->user()->id)->latest()->with(['orderItem'])->get();
        return view('home.dashboard', [
            "orders" => $orders
        ]);
        }else{
            return redirect()->route('site.index');
        }
    }

    public function franchiseSubmit(Request $request) {

        $franchise = new Franchise();
        $franchise->name = $request->name;
        $franchise->email = $request->email;
        $franchise->mob = $request->mob;
        $franchise->location = $request->location;
        $franchise->plan = $request->plan;
        $franchise->state = $request->state;
        $franchise->message = $request->message;
        $franchise->save();
        return redirect()->route('site.index');
    }

    public function contactSubmit(Request $request) {

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->route('site.index');
    }

    public function bookTable(Request $request) {
        $data['table'] = $request->person;
        $data['occassion'] = $request->occassion;
        $data['name'] = $request->name;
        $data['email'] = $request->inputEmail;
        $data['message'] = $request->contactMessage;

        try {

            Mail::to($user->email)->send(new Book($data));
        } catch (\Exception $e) {
            
        }
        return redirect()->route('site.index');
    }
    public function addressSubmit(Request $request) {

        if ($request->isMethod("post")) {

            $validator = Validator::make($request->all(), [
                'address' => ['required'],
                'city' => ['required'],
                'state' => ['required'],
                'pincode' => ['required'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
       
            if (auth()->check()) {
                $user = User::Where('id', auth()->user()->id)->first();
                $user->address = $request->address;
                $user->city = $request->city;
                $user->state = $request->state;
                $user->pincode = $request->pincode;
                if ($user->save()) {
                    return redirect()->route('site.dashboard');
                }
            } else {
                return redirect()->route('site.index')->withErrors("Something went be wrong.")->withInput();
            }
        }

        return redirect()->route('site.dashboard');
    }

    public function profileChange(Request $request) {

        if ($request->isMethod("post")) {

            $validator = Validator::make($request->all(), [
                'inputEmail' => ['required'],
                'name' => ['required'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
       
            if (auth()->check()) {
                $user = User::Where('id', auth()->user()->id)->first();
                $user->name = $request->name;
                $user->email = $request->inputEmail;
               
                if ($user->save()) {
                    return redirect()->route('site.dashboard');
                }
            } else {
                return redirect()->route('site.index')->withErrors("Something went be wrong.")->withInput();
            }
        }

        return redirect()->route('site.dashboard');
    }
    

}
