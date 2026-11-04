@extends('layout.auth')
@section('title','SignUp')

@section('content')
    

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('signup.store') }}" class="signup_form">
        <h2>Sign Up</h2>
        @csrf
        <label for="name">Name
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Name" class="form-control mb-2">
        </label>
        <label for="email">Email
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="abc@gmail.com" class="form-control mb-2">
        </label>
        <label for="password">Password</label>
                <div class="pass-wrap">
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                    <i class="fa-solid fa-eye toggle-pass" onclick="togglePass('password', this)"></i>
                </div>
        <label for="password_confirmation">Password Confirmation</label>
            <div class="pass-wrap">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-Enter Password" class="form-control">
                <i class="fa-solid fa-eye toggle-pass" onclick="togglePass('password_confirmation', this)"></i>
            </div>
        <button type="submit" class="btn btn-danger">Sign Up</button>

        <p class="text-center">If you have already Account? <a href="{{ route('login') }}" class="text-danger">Login</a></p>
    </form>

    
@endsection

<script>
function togglePass(id, icon) {
    const input = document.getElementById(id);
    const show = input.type === 'password';

    input.type = show ? 'text' : 'password';
    icon.classList.toggle('fa-eye', !show);
    icon.classList.toggle('fa-eye-slash', show);
}
</script>