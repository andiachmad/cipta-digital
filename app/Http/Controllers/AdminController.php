<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch real stats where possible, or use 0 as default
        $totalOrders = \App\Models\Order::count();
        $totalRevenue = \App\Models\Order::where('status', 'paid')->sum('total_harga');
        $totalUsers = \App\Models\User::count();
        
        // Get recent orders
        $recentOrders = \App\Models\Order::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('totalOrders', 'totalRevenue', 'totalUsers', 'recentOrders'));
    }
}
