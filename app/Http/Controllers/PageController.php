<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class PageController extends Controller
{
    public function Shop()
    {
        $shops = Shop::latest()->get();

        return view('shop', compact('shops'));
    }
    public function shopDetail($slug)
    {
        $product = Shop::where('slug', $slug)->firstOrFail();

        return view('shop-detail', compact('product'));
    }

    public function thankYou()
    {
        $orderNumber = session('order_number');

        if (!$orderNumber) {
            return redirect()->route('shop');
        }

        return view('thankyou', compact('orderNumber'));
    }
}
