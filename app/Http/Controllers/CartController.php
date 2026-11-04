<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        // dd($request->all());
        $product = Shop::findOrFail($id);

        $qty = max(1, (int) $request->input('qty', 1));

        if ($product->quantity < $qty) {
            return back()->with('error', 'Itna stock available nahi hai.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += $qty;
        } else {
            $cart[$id] = [
                'title' => $product->title,
                'price' => $product->price,
                'image' => $product->image,
                'qty'   => $qty,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Added to cart!');
    }
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);

        return back()->with('success', 'Item removed from cart.');
    }
}
 // $product->quantity = $product->quantity - 1;
        // $product->save();
        // $product = Shop::findOrFail($id);

        // $updated = Shop::where('id', $id)
        //     ->where('quantity', '>', 0)
        //     ->decrement('quantity');

        // if (!$updated) {
        //     return back()->with('error', 'Product out of stock!');
        // }