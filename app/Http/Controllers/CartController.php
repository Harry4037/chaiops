<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\UserAddress;
use App\Models\User;
use Session;

class CartController extends Controller {

    public function addToCart(Request $request, $id, $type) {
        $product = Product::find($id);
        $productType = ProductType::find($type);
        $key = session()->getId();

        if (!$product && !$productType) {
            dd("product not found");
        }
        $cart = session()->get('cart');

        if (auth()->check()) {
            $user_id = auth()->user()->id;
            $session_id = NULL;
            $check_product = Cart::where('product_id', $id)->where('product_type_id', $type)->where('user_id', $user_id)->orWhere('session_id', $session_id)->first();
            if ($check_product) {
                $check_product->session_id = NULL;
                $check_product->user_id = $user_id;
                $check_product->quantity = $check_product->quantity + 1;
                $check_product->save();
            } else {
                $cart = new Cart();
                $check_product->session_id = NULL;
                $check_product->user_id = $user_id;
                $cart->product_id = $id;
                $cart->product_type_id = $productType->id;
                $cart->quantity = 1;
                $cart->save();
            }
        } else {
            $user_id = NULL;
            $session_id = $key;
            $check_product = Cart::where('product_id', $id)->where('product_type_id', $type)->where('session_id', $session_id)->first();
            if ($check_product) {
                $check_product->quantity = $check_product->quantity + 1;
                $cart->session_id = $session_id;
                $check_product->save();
            } else {
                $cart = new Cart();
                $cart->user_id = NULL;
                $cart->session_id = $session_id;
                $cart->product_id = $id;
                $cart->product_type_id = $type;
                $cart->quantity = 1;
                $cart->save();
            }
        }

        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "type" => $type->type,
                    "quantity" => 1,
                    "price" => $type->price,
                    "photo" => $product->img,
                    "type" => $product->type
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {

            $cart[$id]['quantity'] ++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "type" => $type->type,
            "quantity" => 1,
            "price" => $type->price,
            "photo" => $product->img,
            "type" => $product->type
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request) {

        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request) {
        if ($request->id) {

            $cart = session()->get('cart');
            if (session()->get('cart') and auth()->check()) {
                $user = auth()->user();
                $check_product = Cart::where('product_id', $request->id)->where('product_type_id', $request->type)->where('user_id', $user->id)->first();
                if ($check_product) {
                    $check_product->delete();
                }
            }

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout(Request $request) {
        if (auth()->check()) {

            $user = auth()->user();
            $check_product = Cart::where('user_id', $user->id)->with(['product'])->get();
            //    dd($check_product->toArray());
            if ($check_product) {
                $taxPrice = $request->tax;
                $order = new Order();
                $order->user_id = $user->id;
                $order->item_total_amount = $request->total;
                $order->tax_amount = max(round($taxPrice), 0);
                $order->total_amount = max(round($request->total +$taxPrice), 0);
                $order->order_type = "ONLINE";
                $order->address = $request->address;
                $order->city = $request->city;
                $order->state = $request->state;
                $order->pincode = $request->pincode;
                $order->name = $request->name;
                $order->mobile_number = $user->phone_number;
                $order->status = 1;
                $order->payment_text = "CONFIRMED";
                $order->transaction_id = NULL;
                if ($order->save()) {
                    if($user->address == NULL){
                        $user->address = $request->address;
                        $user->city = $request->city;
                        $user->state = $request->state;
                        $user->pincode = $request->pincode;
                        $user->save();
                    }
                    foreach ($check_product as $cartItem) {
                        $orderItem = new OrderItem();
                        $orderItem->order_id = $order->id;
                        $orderItem->product_id = $cartItem->product->id;
                        $orderItem->product_name = $cartItem->product->name;
                        $orderItem->type = $cartItem->product->type;
                        $orderItem->per_item_price = $cartItem->product->price;
                        $orderItem->quantity = $cartItem->quantity;
                        $orderItem->total_price = round($cartItem->quantity * $cartItem->product->price);
                        $orderItem->save();
                    }
                    Cart::where('user_id', $user->id)->delete();
                    if (session()->get('cart')) {
                        session()->put('cart', NULL);
                    }
                }

                return view('home.order');
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function addCart(Request $request) {
        $product = Product::find($request->product_id);
        $productType = ProductType::find($request->product_type_id);

        if (!$product and !$productType ) {
            dd("product not found");
        }

        if (auth()->check()) {
            $alreadyExist = Cart::where(["product_id" => $product->id, "product_type_id" => $productType->id, "user_id" => auth()->user()->id])->first();
            if ($alreadyExist) {
                $alreadyExist->quantity = ($alreadyExist->quantity + 1);
                $alreadyExist->save();
            } else {
                $cart = new Cart();
                $cart->product_id = $product->id;
                $cart->quantity = 1;
                $cart->product_type_id = $productType->id;
                $cart->session_id = NULL;
                $cart->user_id = auth()->user()->id;
                $cart->save();
            }
            $cartCount = Cart::where(["user_id" => auth()->user()->id])->count();
        } else {

            $alreadyExist = Cart::where(["product_id" => $product->id, "product_type_id" => $productType->id, "session_id" => session()->getId()])->first();
            if ($alreadyExist) {
                $alreadyExist->quantity = ($alreadyExist->quantity + 1);
                $alreadyExist->save();
            } else {
                $cart = new Cart();
                $cart->product_id = $product->id;
                $cart->quantity = 1;
                $cart->product_type_id = $productType->id;
                $cart->session_id = session()->getId();
                $cart->user_id = 0;
                $cart->save();
            }
            $cartCount = Cart::where(["session_id" => session()->getId()])->count();
        }
        return response()->json(["cart_count" => $cartCount]);
    }

    public function increaseCartQuantity(Request $request) {
        $product = Product::find($request->product_id);
        $productType = ProductType::find($request->product_type_id);

        if (!$product && !$productType ) {
            dd("product not found");
        }
        $productCount = 0;
        $total = 0;
        if (auth()->check()) {
            $alreadyExist = Cart::where(["product_id" => $product->id, "product_type_id" => $productType->id, "user_id" => auth()->user()->id])->first();
            if ($alreadyExist) {
                $alreadyExist->quantity = ($alreadyExist->quantity + 1);
                $alreadyExist->save();
            }

            $productCount = Cart::where(["product_id" => $product->id, "product_type_id" => $productType->id, "user_id" => auth()->user()->id])->first();
            $total = $this->cartTotal();
        } else {
            $alreadyExist = Cart::where(["product_id" => $product->id, "product_type_id" => $productType->id, "session_id" => session()->getId()])->first();
            if ($alreadyExist) {
                $alreadyExist->quantity = ($alreadyExist->quantity + 1);
                $alreadyExist->save();
            }

            $productCount = Cart::where(["product_id" => $product->id, "product_type_id" => $productType->id, "session_id" => session()->getId()])->first();
            $total = $this->cartTotal();
        }
        return response()->json([
                    "product_count" => $productCount->quantity,
                    "total" => $total
        ]);
    }

    public function decreaseCartQuantity(Request $request) {
        $product = Product::find($request->product_id);
        $productType = ProductType::find($request->product_type_id);

        if (!$product and !$productType ) {
            dd("product not found");
        }
        $productCount = 0;
        $total = 0;
        if (auth()->check()) {
            $alreadyExist = Cart::where(["product_id" => $product->id, "product_type_id" => $productType->id, "user_id" => auth()->user()->id])->first();
            if ($alreadyExist) {
                if ($alreadyExist->quantity > 1) {
                    $alreadyExist->quantity = ($alreadyExist->quantity - 1);
                    $alreadyExist->save();
                }
            }
            $productCount = Cart::where(["product_id" => $product->id, "product_type_id" => $productType->id, "user_id" => auth()->user()->id])->first();
        } else {
            $alreadyExist = Cart::where(["product_id" => $product->id, "product_type_id" => $productType->id, "session_id" => session()->getId()])->first();
            if ($alreadyExist) {
                if ($alreadyExist->quantity > 1) {
                    $alreadyExist->quantity = ($alreadyExist->quantity - 1);
                    $alreadyExist->save();
                }
            }
            $productCount = Cart::where(["product_id" => $product->id, "product_type_id" => $productType->id, "session_id" => session()->getId()])->first();
        }
        $total = $this->cartTotal();
        return response()->json([
                    "product_count" => $productCount->quantity,
                    "total" => $total
        ]);
    }

    public function deleteCartProduct(Request $request) {
        $product = Product::find($request->product_id);
        $productType = ProductType::find($request->product_type_id);

        if (!$product and !$productType ) {
            dd("product not found");
        }

        if (auth()->check()) {
            $alreadyExist = Cart::where(["product_id" => $product->id, "product_type_id" => $productType->id, "user_id" => auth()->user()->id])->first();
            if ($alreadyExist) {
                $alreadyExist->delete();
            }
        } else {
            $alreadyExist = Cart::where(["product_id" => $product->id, "product_type_id" => $productType->id, "session_id" => session()->getId()])->first();
            if ($alreadyExist) {
                $alreadyExist->delete();
            }
        }
        return response()->json("deleted");
    }

}
