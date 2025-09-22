<?php

use Illuminate\Support\Facades\Route;

/* Homepage & Landingpage */
Route::get('/', function () {
    return view('homepage.index');
})->name('homepage.index');

/* Auth Routes */
Route::prefix('auth')->group(function(){

    ## Routing Login
    Route::get('/login', function(){
        return view('auth.login');
    })->name('auth.login');

    Route::get('/register', function(){
        return view('auth.register');
    })->name('auth.register');
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

