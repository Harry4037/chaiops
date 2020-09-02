<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\UserAddress;
use App\Models\User;

class CartController extends Controller {

    public function addToCart(Request $request,$id)
    {
        $product = Product::find($id);

        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');

        if(auth()->check()){
            $user = auth()->user();
            $check_product = Cart::where('product_id', $id)->where('user_id',$user->id)->first();
            if($check_product){
                $check_product->quantity = $check_product->quantity +1;
                $check_product->save();
            }else{
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->product_id = $id;
                $cart->quantity = 1;
                $cart->save();
            }
        }
    
        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->img,
                        "type" => $product->type
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }
      
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->img,
            "type" => $product->type
        ];

        session()->put('cart', $cart);
       
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    
    }

    public function update(Request $request)
    {

        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');
            if(session()->get('cart') and auth()->check()){
                $user = auth()->user();
                $check_product = Cart::where('product_id', $request->id)->where('user_id',$user->id)->first();
                if($check_product){
                    
                    $check_product->delete();
                }
            }

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

  
}
