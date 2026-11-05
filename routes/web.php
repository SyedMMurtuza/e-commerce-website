<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});


Route::get('/shop', [PageController::class, 'Shop'])->name('shop');
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/thank-you', [PageController::class, 'thankYou'])->name('thankyou');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/shop/{slug}', [PageController::class, 'shopDetail'])->name('shop.detail');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/men', [PageController::class, 'men'])->name('men');
Route::get('/women', [PageController::class, 'women'])->name('women');
Route::get('/search', [PageController::class, 'search'])->name('search');


Route::middleware('guest')->group(function () {
    Route::get('/signup', [AuthController::class, 'signupForm'])->name('signup');
    Route::post('/signup', [AuthController::class, 'signup'])->name('signup.store');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::get('/admin/orders', [AdminController::class, 'order'])->name('admin.orders.index');
    Route::get('/admin/shop', [ProductController::class, 'index'])->name('admin.shop');
    Route::get('/admin/shop/add', [ProductController::class, 'add'])->name('admin.add');
    Route::post('/admin/shop/store', [ProductController::class, 'store'])->name('admin.store');
    Route::get('/admin/shop/{id}/edit', [ProductController::class, 'edit'])->name('admin.shop.edit');
    Route::put('/admin/shop/{id}', [ProductController::class, 'update'])->name('admin.shop.update');
    Route::delete('/admin/shop/{id}', [ProductController::class, 'delete'])->name('admin.shop.delete');
});
