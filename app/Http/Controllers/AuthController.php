<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signupForm()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        $data = $request->validate([
            'first_name'     => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
            'user_type'  => 'customer',
        ]);

        return redirect()->route('login')->with('success', 'Account has been created, Now you can Login.');
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            if (Auth::user()->user_type === 'admin') {
                return redirect()->intended('/admin/shop');
            }

            return redirect()->route('customer.dashboard');
        }

        return back()->withErrors(['email' => 'Email or Password is Incorrect.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
