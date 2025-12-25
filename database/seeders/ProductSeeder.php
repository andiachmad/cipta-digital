<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks to allow truncation
        Schema::disableForeignKeyConstraints();
        DB::table('products')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('products')->insert([
            [
                'nama' => 'Website Basic',
                'deskripsi' => 'Solusi website cepat & profesional untuk melejitkan kredibilitas bisnis Anda. Desain modern, responsive, dan siap pakai dalam hitungan hari.',
                'harga' => 500000,
                'photo' => 'images/website_basic.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SEO Service',
                'deskripsi' => 'Strategi jitu agar bisnis Anda mudah ditemukan di halaman pertama Google. Tingkatkan traffic organik dan raih lebih banyak pelanggan potensial.',
                'harga' => 300000,
                'photo' => 'images/seo_service.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Digital Marketing',
                'deskripsi' => 'Dongkrak omzet bisnis dengan kampanye digital yang tepat sasaran. Jangkau audiens tertarget di sosial media dan konversi mereka menjadi pelanggan loyal.',
                'harga' => 750000,
                'photo' => 'images/digital_marketing.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}