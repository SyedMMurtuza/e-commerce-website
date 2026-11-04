<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{

    function index()
    {

        $data = Shop::latest()->get();

        return view('admin.shop.index', compact('data'));
    }

    public function add()
    {
        return view('admin.shop.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'tags'  => 'nullable|max:255',
            'badge' => 'nullable|in:new,old',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'quantity' => 'required|numeric|min:5'
        ]);

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('shop', 'public');
        }

        Shop::create($data);

        return redirect()->route('admin.add')->with('success', 'Product added!');
    }

    public function edit($id)
    {
        $product = Shop::where('id', $id)->firstOrFail();

        return view('admin.shop.add', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Shop::where('id', $id)->firstOrFail();

        $data = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'tags'  => 'nullable|max:255',
            'badge' => 'nullable|in:new,old',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'quantity' => 'required|numeric|min:5'
        ]);

        unset($data['image']);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('shop', 'public');
        }
        $product->update($data);

        return redirect('/admin/shop')->with('success', 'Product has Updated!');
    }

    public function delete($id)
    {
        $product = Shop::findOrFail($id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect('/admin/shop')->with('success', 'Product deleted!');
    }
}
