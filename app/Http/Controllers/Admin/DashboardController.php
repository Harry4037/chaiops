<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Contact;

class DashboardController extends Controller {

    public function index(Request $request) {

        $users = User::where(["user_role_id" => '3'])->count(); 
        $orders = Order::where(["status" => '1'])->count(); 
        $contacts = Contact::count(); 
        return view('admin.dashboard.index', [
            "users" => $users,
            "orders" => $orders,
            "contacts" => $contacts,
        ]);
    }

}
