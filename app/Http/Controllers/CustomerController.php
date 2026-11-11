<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function OrderDetail()
    {
        $data = OrderItem::with('order')->latest()->get();

        return view('customer.dashboard', compact('data'));
    }


    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'address'    => 'nullable|string|max:255',
            'apartment'  => 'nullable|string|max:255',
            'city'       => 'nullable|string|max:255',
            'zip_code'   => 'nullable|string|max:20',
            'country'    => 'nullable|string|max:100',
        ]);

        $user->update($validated);

        return back()->with('success', 'Profile updated successfully!');
    }
}
