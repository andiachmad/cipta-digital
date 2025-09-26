<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'nama' => 'Website Basic',
                'deskripsi' => 'Website sederhana untuk UMKM',
                'harga' => 500000,
                'photo' => 'website_basic.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SEO Service',
                'deskripsi' => 'Optimasi SEO untuk website',
                'harga' => 300000,
                'photo' => 'seo_service.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
