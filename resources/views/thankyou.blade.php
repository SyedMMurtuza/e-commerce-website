@extends('layout.app')

@section('content')
    <section class="thankyou_section py-5">
        <div class="container text-center py-5 bg-white rounded-5 w-50">
            <i class="fa-solid fa-circle-check thankyou_icon"></i>
            <h2 class="mt-3">Thank you for your order!</h2>
            <p class="mb-1">Your order number is</p>
            <h4 class="fw-bold">{{ $orderNumber }}</h4>
            <a href="{{ route('shop') }}" class="btn btn-dark mt-4">Continue Shopping</a>
        </div>
    </section>
@endsection
