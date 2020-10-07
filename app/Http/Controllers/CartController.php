<?php

namespace App\Http\Controllers;

use Razorpay\Api\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use Carbon\Carbon;
use Validator;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\UserAddress;
use App\Models\User;
use Session;

class CartController extends Controller {

        //test key
        private $razorpayId = "rzp_test_66o0k8Qc6D6HOf";
        private $razorpayKey = "sGcsoZrIsvY37tUnwmjN9Ow5";
        

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
            $check_product = Cart::where('user_id', $user->id)->with(['product', 'productType'])->get();
            //    dd($check_product->toArray());
            if ($check_product) {
                $taxPrice = $request->tax;
                $dbOrder = new Order();
                $dbOrder->user_id = $user->id;
                $dbOrder->item_total_amount = $request->total;
                $dbOrder->tax_amount = max(round($taxPrice), 0);
                $dbOrder->total_amount = max(round($request->total +$taxPrice), 0);
                $amount = (int) ( $dbOrder->total_amount * 100);
                $dbOrder->order_type = "ONLINE";
                $dbOrder->address = $request->address;
                $dbOrder->city = $request->city;
                $dbOrder->state = $request->state;
                $dbOrder->pincode = $request->pincode;
                $dbOrder->name = $request->name;
                $dbOrder->status = 0;
                $dbOrder->mobile_number = $request->phone;
                $dbOrder->payment_text = "FAILED";
                $dbOrder->transaction_id = NULL;
                if ($dbOrder->save()) {
                    if($user->address == NULL){
                        $user->address = $request->address;
                        $user->city = $request->city;
                        $user->state = $request->state;
                        $user->pincode = $request->pincode;
                        $user->save();
                    }
                    foreach ($check_product as $cartItem) {
                        $orderItem = new OrderItem();
                        $orderItem->order_id = $dbOrder->id;
                        $orderItem->product_id = $cartItem->product->id;
                        $orderItem->product_name = $cartItem->product->name;
                        $orderItem->type = $cartItem->productType->type;
                        $orderItem->per_item_price = $cartItem->productType->price;
                        $orderItem->quantity = $cartItem->quantity;
                        $orderItem->total_price = round($cartItem->quantity * $cartItem->productType->price);
                        $orderItem->save();
                    }

                    // Generate random receipt id
                    $receiptId = Str::random(20);

                    // Create an object of razorpay
                    $api = new Api($this->razorpayId, $this->razorpayKey);

                    // In razorpay you have to convert rupees into paise we multiply by 100
                    // Currency will be INR
                    // Creating order
                    $order = $api->order->create([
                        'receipt' => $receiptId,
                        'amount' => $amount,
                        'currency' => 'INR'
                    ]);
                    $dbOrder->transaction_id = $order['id'];
                    $dbOrder->save();
                    // Return response on payment page
                    $response = [
                        'orderId' => $order['id'],
                        'razorpayId' => $this->razorpayId,
                        'amount' => $amount,
                        'name' => auth()->user()->name,
                        'currency' => 'INR',
                        'email' => auth()->user()->email,
                        'contactNumber' => auth()->user()->phone_number,
                        'address' => auth()->user()->address,
                        'description' => 'Testing description',
                    ];
                    Cart::where('user_id', $user->id)->delete();
                    if (session()->get('cart')) {
                        session()->put('cart', NULL);
                    }
                     // Let's checkout payment page is it working
                     return view('home.payment-page', compact('response'));

                   
                }

                return view('home.order');
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function Complete(Request $request) {
        // Now verify the signature is correct . We create the private function for verify the signature
        $signatureStatus = $this->SignatureVerify(
                $request->razorpay_signature, $request->razorpay_payment_id, $request->razorpay_order_id
        );

        // If Signature status is true We will save the payment response in our database
        // In this tutorial we send the response to Success page if payment successfully made
        if ($signatureStatus == true) {
            $order = Order::where(["transaction_id" => $request->razorpay_order_id])->first();
            if ($order) {
                // $package = Product::with(["packagecourse" => function($query) {
                //                 $query->with(["course" => function($query) {
                //                         $query->with("courseclass");
                //                     }]);
                //             }])->find($order->package_id);
//                dd($package->toArray());
// $data1 = Order::where('id',$order->id)->with(['user','package'])->first();
//             $html = view('emails.invoice-pdf', [
//                 'data' => $data1,
//             ]);
//          $data["email"]= $data1->user->email;
//         $data["client_name"]= $data1->user->name;
//         $data["subject"]="GymEurofit Invoice ";


            
//               $pdf = PDF::loadView('emails.invoice-pdf', [
//                 'data' => $data1,
//             ]);
            
//                try{
                            
//             Mail::send('emails.invoice', $data, function($message)use($data,$pdf) {
//             $message->to($data["email"], $data["client_name"])
//             ->subject($data["subject"])
//             ->attachData($pdf->output(), "invoice.pdf");
           
//             });
//                } catch (\Exception $e) {
//         }
                if ($order) {
                
                    $order->payment_text = "CONFIRMED";
                    $order->status = 1;
                    if ($order->save()) {
                        try {
                            $user = User::find($order->user_id);
                            $orderItems = OrderItem::with('product')->where(["order_id" => $order->id])->get();
                            $data['user'] = $user;
                            $data['orderItem'] = $orderItems;
                            $data['order'] = $order;
                         
                            // return view('emails.book', [
                            //     'data' => $data,
                            // ]);
                      
                            Mail::send('emails.book', $data, function($message) use($data) {
                               $message->to($data['user']->email ,$data['user']->name)
                               ->subject('Order Invoice');
                            //    $message->from('info@chaiops.com','Chaiops Team');
                            });
                        } catch (\Exception $e) {
                            
                        }
                        
                    }
                }
            }

            return redirect()->route('site.dashboard')->with('success', 'Order successfully.');
            // You can create this page
//            return view('payment-success-page');
        } else {
            return redirect()->route('site.dashboard')->with('error', 'Payment failed.');
            // You can create this page
//            return view('payment-failed-page');
        }
    }

// In this function we return boolean if signature is correct
    private function SignatureVerify($_signature, $_paymentId, $_orderId) {
        try {
            // Create an object of razorpay class
            $api = new Api($this->razorpayId, $this->razorpayKey);
            $attributes = array('razorpay_signature' => $_signature, 'razorpay_payment_id' => $_paymentId, 'razorpay_order_id' => $_orderId);
            $order = $api->utility->verifyPaymentSignature($attributes);
            return true;
        } catch (\Exception $e) {
            // If Signature is not correct its give a excetption so we use try catch
            return false;
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
