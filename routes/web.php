<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::prefix('homepage')->group(function(){

    ## Product
    Route::get('/products', function(){
        return view('homepage.products');
    })->name('homepage.products');

    ## Cart
    Route::get('/cart', function(){
        return view('homepage.cart');
    })->name('homepage.cart');
});

/* Admin Dashboard */
Route::get('/admin', function () {
    return view('admin.admin');
})->name('admin.dashboard');


