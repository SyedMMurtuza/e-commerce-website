@extends('layout.app')
@section('title', 'Sign In')
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="d-flex flex-column w-100 justify-content-center align-items-center gap-4">
        <form method="POST" action="{{ route('signin.store') }}" class="login_form mt-5 mb-3 bg-white shadow-sm">
            @csrf
            <h4 class="login_title text-dark">Welcome</h4>
            <p class="login_sub">Sign in to manage your products</p>

            <div class="mb-3">
                <label for="email" class="text-dark">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="abc@gmail.com"
                    class="form-control bg-white" required autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="text-dark">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="form-control bg-white" required>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label text-dark" for="remember">Remember Me</label>
            </div>

            <button type="submit" class="login_btn bg-dark text-white">Sign In</button>
        </form>
    </div>

@endsection
