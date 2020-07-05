<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(config('olshop.pagination'));

        return view('application.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('application.order.show', compact('order'));
    }
}
