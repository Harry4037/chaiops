<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\View;

class HomeController extends Controller {

    public function index(Request $request) {

        $categories = Category::where('id', 1)->with(['product'])->first();
     //dd($categories->product->toArray());
        return view('home.index', [
            'categories' => $categories,
        ]);
    }

    public function aboutPage() {
        return view('home.about');
    }

    public function menuPage() {
        return view('home.menu');
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

}
