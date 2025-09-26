<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        // Ambil user customer secara acak
        $user = User::where('role', 'customer')->inRandomOrder()->first();

        // Buat order untuk user
        $order = $user->orders()->create([
            'total_harga' => 0, // nanti bisa dihitung dari order details
        ]);

        // Kembalikan order untuk dipakai di OrderDetailsSeeder
        return $order;
    }
}
