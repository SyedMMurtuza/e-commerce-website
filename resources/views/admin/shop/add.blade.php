@extends('layout.backend')

@section('content')
    <div class="container pt-5 pb-5">
        <h2>{{ isset($product) ? 'Edit Inventory' : 'Add Inventory' }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ isset($product) ? route('admin.shop.update', $product->id) : route('admin.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($product))
                @method('PUT')
            @endif
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control mb-3" placeholder="Enter Title"
                value="{{ old('title', $product->title ?? '') }}">

            <label for="tags">Product Color:</label>
            <input type="text" name="tags" class="form-control mb-3" placeholder="Enter Product Color"
                value="{{ old('tags', $product->tags ?? '') }}">

            <label for="badge">Badge:</label>
            <select name="badge" class="form-control mb-3">
                <option value="old" {{ old('badge', $product->badge ?? 'old') == 'old' ? 'selected' : '' }}>Old</option>
                <option value="new" {{ old('badge', $product->badge ?? '') == 'new' ? 'selected' : '' }}>New</option>
            </select>
            <div class="row">

                <div class="col-lg-6">

                    <label for="price">Enter Price:</label>
                    <input type="number" step="0.01" name="price" class="form-control mb-3" placeholder="Enter Price"
                        value="{{ old('price', $product->price ?? '') }}">
                </div>

                <div class="col-lg-6">
                    <label for="quantity">Enter Quantity:</label>
                    <input type="number" step="1" name="quantity" class="form-control mb-3"
                        placeholder="Enter Quantity" value="{{ old('quantity', $product->quantity ?? '') }}">
                </div>
            </div>

            <div class="mb-3">
                <img id="preview_img"
                    src="{{ isset($product) && $product->image ? asset('storage/' . $product->image) : '' }}"
                    alt="" height="80" class="rounded {{ isset($product) && $product->image ? '' : 'd-none' }}">
                <label for="image">Product Image:</label>
                <input type="file" name="image" id="image" accept="image/*" class="form-control">
            </div>

            <button type="submit"
                class="btn btn-success">{{ isset($product) ? 'Update Inventory' : 'Add Inventory' }}</button>
        </form>
    </div>
@endsection
