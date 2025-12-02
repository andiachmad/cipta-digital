<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'cart_id';

    protected $fillable = ['user_id', 'product_id', 'jumlah'];

    // Setiap cart dimiliki oleh satu user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // Setiap cart hanya berisi satu produk (dengan jumlah tertentu)
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}