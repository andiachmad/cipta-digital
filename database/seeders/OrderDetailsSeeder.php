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

        // Tambahkan order detail
        $orderDetail = $order->orderDetails()->create([
            'product_id' => $product->product_id,
            'jumlah' => rand(1, 3),
            'harga' => $product->harga,
        ]);

        // Update total harga order
        $order->update(['total_harga' => $orderDetail->jumlah * $orderDetail->harga]);
    }
}
