@extends('layout.app')

@section('title', 'My Account')

@section('content')

    <div class="container container-1580 pt-5 pb-5">
        <div class="d-flex justify-content-between gap-2">
            <div class="front_sidebar bg-white h-50vh d-flex gap-3 flex-column position-relative shadow-sm">

                <h4>Customer DashBoard</h4>
                <ul>

                    <a href="{{ route('customer.dashboard') }}">
                        <li>Order Detail</li>
                    </a>
                    <a href="{{ route('customer.dashboard', ['tab' => 'profile']) }}">
                        <li>Your Profile</li>
                    </a>

                </ul>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-dark">Logout</button>
                </form>
            </div>
            <div class="container">
                <div class="bg-white rounded shadow-sm p-4 w-100">

                    <h2>Welcome, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }} 👋</h2>
                    <p>{{ auth()->user()->email }}</p>
                </div>

                @if (request('tab') === 'profile')
                    <x-profile-form />
                @else
                    <x-order-detail :data="$data" />
                @endif
            </div>
        </div>
    </div>

@endsection
