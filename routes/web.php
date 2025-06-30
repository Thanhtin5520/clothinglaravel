<?php

use Illuminate\Support\Facades\Route;

// web.php

// Redirect root to login page
Route::get('/', function () {
    return redirect()->route('login');
});

// Homepage route
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Product routes
Route::resource('products', App\Http\Controllers\ProductController::class);

// Cart routes
Route::get('cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::post('cart/add/{product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('cart/remove/{product}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');

// Authentication routes
Auth::routes();

// Login and Registration routes
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Social Login routes
Route::get('auth/{provider}', [App\Http\Controllers\Auth\SocialLoginController::class, 'redirectToProvider'])->name('social.login');
Route::get('auth/{provider}/callback', [App\Http\Controllers\Auth\SocialLoginController::class, 'handleProviderCallback']);

// Profile routes
Route::get('profile', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth')->name('profile');