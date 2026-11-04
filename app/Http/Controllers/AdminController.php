<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shop;
use App\Models\OrderItem;


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
}
