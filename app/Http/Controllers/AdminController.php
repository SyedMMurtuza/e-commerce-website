<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shop;
use App\Models\OrderItem;
use Illuminate\Http\Request;


class admincontroller extends Controller
{
    public function admin()
    {
        $ShopCount  = Shop::count();
        $orderCount = Order::count();

        return view('admin.admin-index', compact('ShopCount', 'orderCount'));
    }


    public function order()
    {
        $data = OrderItem::with('order')->latest()->get();

        return view('admin.orders.index', compact('data'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'order_status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->update(['order_status' => $request->order_status]);

        return back()->with('success', 'Order status updated!');
    }
}
