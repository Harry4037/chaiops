<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Franchise;


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
