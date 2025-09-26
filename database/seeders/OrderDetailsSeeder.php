<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;

class OrderDetailsSeeder extends Seeder
{
    public function run()
    {
        // Ambil order terakhir
        $order = Order::latest()->first();

        // Ambil produk secara acak
        $product = Product::inRandomOrder()->first();

        // Tentukan jumlah produk
        $jumlah = rand(1, 3);

        // Tambahkan order detail
        $orderDetail = $order->orderDetails()->create([
            'product_id' => $product->product_id,
            'jumlah' => $jumlah,
            'harga' => $product->harga * $jumlah, // total harga untuk detail ini
        ]);

        // Update total harga order berdasarkan semua order details
        $order->update([
            'total_harga' => $order->orderDetails->sum(fn($detail) => $detail->harga)
        ]);
    }
}
