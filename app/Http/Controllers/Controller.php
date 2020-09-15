<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use session;
use App\Models\Cart;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function cartTotal() {
        $total = 0;
        if (auth()->check()) {
            $cartItems = Cart::with('product')->where(["user_id" => auth()->user()->id])->get();
            foreach ($cartItems as $item) {
                if ($item->product) {
                    $total += ($item->product->price * $item->quantity);
                }
            }
        } else {
            $cartItems = Cart::with('product')->where(["session_id" => session()->getId()])->get();
            foreach ($cartItems as $item) {
                if ($item->product) {
                    $total += ($item->product->price * $item->quantity);
                }
            }
        }
        
        return $total;
    }

}
