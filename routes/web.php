<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

/* Public Website Pages */
Route::get('/', [PageController::class, 'home'])->name('homepage.index');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/projects', [PageController::class, 'projects'])->name('projects.index');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

/* Auth Routes */
Route::prefix('auth')->group(function(){
    Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');
    Route::get('/register', [AuthController::class, 'registerForm'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

/* Legacy/Admin Logic - Kept for reference or Admin Panel */
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        return view('admin.admin');
    })->name('admin.dashboard');

    Route::get('/api/orders', [OrderController::class, 'index']);
    Route::put('/api/orders/{id}', [OrderController::class, 'update']);
    Route::delete('/api/orders/{id}', [OrderController::class, 'destroy']);

    Route::get('/api/users', [UserController::class, 'index']);
    Route::delete('/api/users/{id}', [UserController::class, 'destroy']);
});



