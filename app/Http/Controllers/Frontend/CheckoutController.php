<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Notifications\UserOrderNotification;

class CheckoutController extends Controller
{
    public function index()
    {
        $items = session('cart');
        $couriers = config('olshop.couriers');
        return view('frontend.checkout.index', compact('items', 'couriers'));
    }

    public function store(Order $order, Request $request)
    {
        $items = collect(session('cart'));

        $order->user_id = auth()->id();
        $order->user_name = $request->name;
        $order->user_address = $request->address;
        $order->user_phone = $request->phone;
        $order->status = 'UNPAID';
        $order->courier = "{$request->courier} {$request->service}";
        $order->shipping_cost = $request->shiping;
        $order->total = $items->sum('price');

        $order->notify(new UserOrderNotification());

        $order->save();

        $items->each(function($item) use ($order) {
            $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $item['product_id'];
                $orderDetail->qty = $item['qty'];
                $orderDetail->price = $item['price'];
                $orderDetail->subtotal = $item['qty'] * $item['price'];

                $orderDetail->save();
        });

        session()->forget('cart');
        return redirect()->route('frontend.order.show', $order);
    }
}
