<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

class CartSeeder extends Seeder
{
    public function run()
    {
        // Ambil user customer secara acak
        $user = User::where('role', 'customer')->inRandomOrder()->first();
        // Ambil product secara acak
        $product = Product::inRandomOrder()->first();

        // Buat cart untuk user tersebut
        $user->carts()->create([
            'product_id' => $product->product_id,
            'jumlah' => rand(1, 3), // jumlah acak
        ]);
    }
}
