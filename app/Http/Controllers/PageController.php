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
    public function men()
    {
        $products = Shop::where('gender', 'men')->latest()->get();
        return view('men', compact('products'));
    }

    public function women()
    {
        $products = Shop::where('gender', 'women')->latest()->get();
        return view('women', compact('products'));
    }

    public function search(Request $request)
    {
        $word = $request->bird;
        $shops = Shop::where('title', 'like', '%' . $word . '%')->get();

        return view('search', compact('shops', 'word'));
    }
}
