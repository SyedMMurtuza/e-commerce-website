@extends('layout.app')

@section('title', 'My Account')

@section('content')

    <div class="container container-1580 pt-5 pb-5">
        <div class="d-flex justify-content-between gap-2">
            <div class="front_sidebar bg-white h-50vh d-flex gap-3 flex-column position-relative">

                <h4>Customer DashBoard</h4>
                <ul>

                    <a href="">
                        <li>Order Detail</li>
                    </a>
                    <a href="">
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

                <x-order-detail :data=$data />
            </div>
        </div>
    </div>

@endsection
