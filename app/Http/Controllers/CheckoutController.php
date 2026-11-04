<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['qty'];
        }

        return view('checkout', compact('cart', 'subtotal'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('checkout')->with('error', 'Your cart is empty.');
        }

        $data = $request->validate([
            'email'      => 'required|email|max:100',
            'first_name' => 'required|max:100',
            'last_name'  => 'required|max:100',
            'address'    => 'required|max:255',
            'apartment'  => 'nullable|max:255',
            'city'       => 'required|max:255',
            'zip_code'   => 'required|max:20',
            'country'    => 'required|max:100',
        ]);

        $order = DB::transaction(function () use ($data, $cart) {

            $user = User::firstOrNew(['email' => $data['email']]);
            $user->first_name = $data['first_name'];
            $user->last_name  = $data['last_name'];
            $user->address   = $data['address'];
            $user->apartment = $data['apartment'] ?? null;
            $user->city      = $data['city'];
            $user->zip_code  = $data['zip_code'];
            $user->country   = $data['country'];
            $user->save();

            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['qty'];
            }

            $order = Order::create([
                'order_number' => $this->generateOrderNumber(),
                'order_amount' => $total,
                'user_id'      => $user->id,
            ]);

            foreach ($cart as $productId => $item) {
                OrderItem::create([
                    'order_id'    => $order->id,
                    'item_id'     => $productId,
                    'title'       => $item['title'],
                    'unit_amount' => $item['price'],
                    'qty'         => $item['qty'],
                    'amount'      => $item['price'] * $item['qty'],


                ]);
                $product = Shop::find($productId);
                $product->quantity = $product->quantity - $item['qty'];
                $product->save();
            }

            return $order;
        });



        session()->forget('cart');

        return redirect()->route('thankyou')->with('order_number', $order->order_number);
    }
    private function generateOrderNumber()
    {
        do {
            $number = 'ORD-' . now()->format('ymd') . '-' . strtoupper(Str::random(5));
        } while (Order::where('order_number', $number)->exists());

        return $number;
    }
}
