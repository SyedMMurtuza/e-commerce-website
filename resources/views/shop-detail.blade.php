@extends('layout.app')
@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@section('content')
    <div class="container container-1400 mt-5 mb-5">
        <div class="row">
            <div class="col-lg-8 mt-0">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="w-100" height="800">
            </div>
            <div class="col-lg-4">
                {{-- @if ($product->badge === 'new')
                <span class="grid_badge">New</span>
            @endif --}}
                <div class="shop-detail">
                    <div class="d-flex flex-column justify-content-between gap-5">


                        <div>

                            <h2 class="mt-3">{{ $product->title }}</h2>
                            <div class="d-flex align-items-center gap-2">

                                <h4 class="mt-0 mb-0">${{ $product->price }}</h4>
                                <span
                                    style="
                background: #ccc; padding: 0px 10px; border-radius: 20px; text-transform: uppercase; font-weight: 700; font-size: 14px;">
                                    + Free Shipping</span>
                            </div>
                        </div>
                        <div>

                            @if ($product->tags)
                                <div>
                                    <span style="font-size: 10px">COLOR <strong class="text-dark"
                                            style="font-size: 14px; padding-left: 5px;">{{ $product->tags }}</strong>
                                    </span>
                                </div>
                            @endif
                        </div>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf

                            <div>
                                <h6>Quantity</h6>
                                <div class="qty_box mt-2 mb-2">
                                    <button type="button" class="qty_btn" id="qty_minus">-</button>
                                    <input type="number" name="qty" id="qty_input" value="1" min="1"
                                        max="{{ $product->quantity }}" readonly>
                                    <button type="button" class="qty_btn" id="qty_plus">+</button>
                                </div>
                            </div>
                    </div>
                    @if ($product->quantity > 0)
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-dark mt-3 w-100">Add to Cart</button>
                        </form>
                    @else
                        <button class="btn btn-secondary mt-3 w-100" disabled>Out of Stock</button>
                    @endif
                    <p class="text-center" style="font-size: 10px">Free Shipping on Orders over $100</p>
                    </form>
                    {{-- <div> --}}



                </div>
            </div>
        </div>
    </div>
    <x-home-slider></x-home-slider>
    <x-home-info></x-home-info>
@endsection
