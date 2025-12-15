<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of orders for Admin.
     */
    public function adminIndex()
    {
        $orders = \App\Models\Order::with('user')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified order details for Admin.
     */
    public function show($id)
    {
        $order = \App\Models\Order::with(['user', 'details.product'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update the order status (e.g. Payment Verification).
     */
    public function updateStatus(Request $request, $id)
    {
        $order = \App\Models\Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    // API / Legacy methods below
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all orders with user and details for the admin dashboard
        $orders = Order::with(['user', 'orderDetails.product'])->orderBy('created_at', 'desc')->get();
        return response()->json($orders);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        return response()->json(['message' => 'Order status updated successfully', 'order' => $order]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
