<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Franchise;
use App\Models\Product;
use Illuminate\Support\Facades\View;

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

        $categories = Category::where('id', 1)->with(['product'])->first();
        return view('home.index', [
            'categories' => $categories,
        ]);
    }

    public function aboutPage() {
        return view('home.about');
    }

    public function menuPage() {
        $categories = Category::where('is_active', 1)->with(['product'])->get();
        return view('home.menu', [
            'categories' => $categories,
        ]);
    }

    public function storePage() {
        return view('home.shop');
    }

    public function contactPage() {
        return view('home.contact');
    }

    public function cartPage() {
        return view('home.cart');
    }
    public function franchise() {
        return view('home.franchise');
    }
    public function dashboard() {
        return view('home.dashboard');
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
        return view('home.franchise'); 
    }    

}
