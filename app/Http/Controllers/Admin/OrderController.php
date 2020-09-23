<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;

class OrderController extends Controller {

    public function index(Request $request) {
        $css = [
            'css/jquery.dataTables.css',
            'css/font-awesome.css',
        ];
        $js = [
            'js/jquery.dataTables.js',
        ];
        return view('admin.order.index', [
            'js' => $js,
            'css' => $css,
        ]);
    }

    public function orderList(Request $request) {
        try {
            $search_invoice = $request->invoice_id;
//            $mobile = $request->mobile;
            $p_type = $request->p_type;
            $p_status = $request->p_status;
            $o_status = $request->o_status;

            $offset = $request->get('start') ? $request->get('start') : 0;
            $limit = $request->get('length');

            $query = Order::query();
            if ($search_invoice) {
                $query->where("id", 'LIKE', "%$search_invoice%");
            }
            if ($p_type) {
                $query->where("order_type", $p_type);
            }
            if ($p_status) {
                $query->where("payment_text", $p_status);
            }
            if ($o_status) {
                $query->where("status", $o_status);
            }

            $query->where('status', '!=', 0);
            $query->where(function($query) {
                $query->where('order_type', '!=', 'ONLINE')
                        ->orWhere('payment_text', '!=', 'PENDING');
            });
            $data['recordsTotal'] = $query->count();
            $data['recordsFiltered'] = $query->count();
            $orders = $query->latest()->get();

            $ordersArray = [];
            foreach ($orders as $k => $order) {
                $dateTime = Carbon::parse($order->created_at);
                $orderTxt = "";
                if ($order->status == 1) {
                    $orderTxt = "<label class='btn btn-default btn-xs disabled'>PENDING</label>";
                } elseif ($order->status == 2) {
                    $orderTxt = "<label class='btn btn-warning btn-xs disabled'>ACCEPTED</label>";
                } elseif ($order->status == 3) {
                    $orderTxt = "<label class='btn btn-info btn-xs disabled'>ORDER ASSIGNED</label>";
                } elseif ($order->status == 4) {
                    $orderTxt = "<label class='btn btn-success btn-xs disabled'>DELIVERED</label>";
                } elseif ($order->status == 5) {
                    $orderTxt = "<label class='btn btn-danger btn-xs disabled'>" . $order->cancel_by . "</label>";
                } else {
                    $orderTxt = "<label class='btn btn-danger btn-xs disabled'>FAILED</label>";
                }

                $paymentTxt = '';
                if ($order->payment_text == 'PENDING') {
                    $paymentTxt = "<label class='btn btn-default btn-xs disabled'>$order->payment_text</label>";
                } elseif ($order->payment_text == 'CONFIRMED') {
                    $paymentTxt = "<label class='btn btn-success btn-xs disabled'>$order->payment_text</label>";
                } elseif ($order->payment_text == 'REFUNDED') {
                    $paymentTxt = "<label class='btn btn-info btn-xs disabled'>$order->payment_text</label>";
                } else {
                    $paymentTxt = "<label class='btn btn-danger btn-xs disabled'>$order->payment_text</label>";
                }
                $ordersArray[$k]['invoice_id'] = $order->id;
                $mobi = User::where("id", $order->user_id)->first();
//                $ordersArray[$k]['mobile_number'] = $mobi->mobile_number;
                $ordersArray[$k]['order_status'] = $orderTxt;
                $ordersArray[$k]['order_type'] = $order->order_type;
                $ordersArray[$k]['payment_status'] = $paymentTxt;
                $ordersArray[$k]['created_at'] = $dateTime->format('d/m/Y');
                $ordersArray[$k]['action'] = '<a href="' . route('admin.order.view', $order) . '" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View </a>';
            }

            $data['data'] = $ordersArray;
         
            return $data;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function orderView(Request $request, Order $order) {
        try {
            if ($request->isMethod("post")) {
                $order->status = 2;
                if ($order->save()) {
                    return back()->with('status', 'Order has been accepted successfully.');
                } else {
                    return back()->with('error', 'Something went be wrong.');
                }
            }

          
            $user = User::find($order->user_id);
            $orderItems = OrderItem::with('product')->where(["order_id" => $order->id])->get();
         
            return view('admin.order.view', [
                'resturantAdd' => null,
                'order' => $order,
                'user' => $user,
                'orderItems' => $orderItems,
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.order.index')->with('error', $ex->getMessage());
        }
    }

    public function acceptStatus(Request $request) {
        $order = Order::find($request->order_id);
        if ($order) {
            if ($order->status == 5) {
                return response()->json(["status" => FALSE, 'message' => 'Order cancelled by user.']);
            }

            $order->status = 2;
            // $order->time_2 = date("H:i:s");
            $order->save();
          
            return response()->json(["status" => TRUE, 'message' => 'Order accepted.']);
        } else {
            return response()->json(["status" => TRUE, 'message' => 'Something went wrong.']);
        }
    }

    public function markComplete(Request $request) {
        try {
            $orderId = $request->order_id;
            $order = Order::find($orderId);
            $order->payment_text = 'CONFIRMED';
            $order->status = 4;
            // $order->time_4 = date("H:i:s");
            $order->save();

            return response()->json(['status' => TRUE, 'message' => 'Order Completed.']);
        } catch (Exception $ex) {
            return response()->json(['status' => false, 'message' => $ex->getMessage()]);
        }
    }

    public function cancelOrder(Request $request) {
        try {
            $order = Order::find($request->order_id);
            if ($order) {
                if ($order->status == 5) {
                    return response()->json(["status" => FALSE, 'message' => 'order already cancelled by user.']);
                } else {
                    $order->status = 5;
                    $order->cancel_by = 'CANCELLED BY ADMIN';
                    $order->cancel_description = 'Order has been cancelled by admin';
                    $order->save();

                    return response()->json(["status" => TRUE, 'message' => 'order Cancelled']);
                }
            } else {
                return response()->json(["status" => FALSE, 'message' => 'Something went wrong.']);
            }
        } catch (Exception $ex) {
            return response()->json(["status" => FALSE, 'message' => $ex->getMessage()]);
        }
    }

}