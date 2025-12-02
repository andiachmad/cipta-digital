<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

/* Homepage & Landingpage */
Route::get('/', function () {
    return view('homepage.index');
})->name('homepage.index');

/* Auth Routes */
Route::prefix('auth')->group(function(){

    // View login
    Route::get('/login', function(){
        return view('auth.login');
    })->name('auth.login');

    // Proses login
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');

    // View register
    Route::get('/register', function(){
        return view('auth.register');
    })->name('auth.register');

    // Proses register
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});


/* Homepage Feature */
/* Homepage Feature */
Route::middleware('auth')->prefix('homepage')->group(function(){

    ## Product
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('homepage.products');

    ## Cart
    Route::get('/cart', [CartController::class, 'index'])->name('homepage.cart');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/submit', [CartController::class, 'submit'])->name('cart.submit');
});

/* Admin Dashboard */
/* Admin Dashboard */
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        // Ensure only admin can access
        if (Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        return view('admin.admin');
    })->name('admin.dashboard');

    // API for Admin JS
    Route::get('/api/orders', [App\Http\Controllers\OrderController::class, 'index']);
    Route::put('/api/orders/{id}', [App\Http\Controllers\OrderController::class, 'update']);
    Route::delete('/api/orders/{id}', [App\Http\Controllers\OrderController::class, 'destroy']);

    Route::get('/api/users', [App\Http\Controllers\UserController::class, 'index']);
    Route::delete('/api/users/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
});


