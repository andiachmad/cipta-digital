<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('homepage.cart', compact('carts', 'orders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'jumlah' => 'required|integer|min:1'
        ]);

        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('homepage.cart')->with('success', 'Product added to cart');
    }

    public function destroy($id)
    {
        $cart = Cart::where('cart_id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cart->delete();
        return redirect()->back()->with('success', 'Item removed from cart');
    }

    public function submit()
    {
        $user_id = Auth::id();
        $carts = Cart::with('product')->where('user_id', $user_id)->get();

        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Cart is empty');
        }

        DB::transaction(function () use ($user_id, $carts) {
            $total_harga = 0;
            foreach ($carts as $cart) {
                $total_harga += $cart->product->harga * $cart->jumlah;
            }

            $order = Order::create([
                'user_id' => $user_id,
                'total_harga' => $total_harga,
                'status' => 'pending'
            ]);

            foreach ($carts as $cart) {
                OrderDetail::create([
                    'order_id' => $order->order_id,
                    'product_id' => $cart->product_id,
                    'jumlah' => $cart->jumlah,
                    'harga' => $cart->product->harga
                ]);
            }

            Cart::where('user_id', $user_id)->delete();
        });

        return redirect()->back()->with('success', 'Order submitted for approval');
    }
}
