<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function OrderDetail()
    {
        $data = OrderItem::with('order')->latest()->get();

        return view('customer.dashboard', compact('data'));
    }
}
