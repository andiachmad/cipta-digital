<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = ['nama', 'deskripsi', 'harga', 'photo'];

    // Satu produk bisa terdapat di banyak keranjang belanja
    public function carts(){
        return $this->hasMany(Cart::class, 'product_id');
    }

    // Satu produk bisa terdapat di banyak detail transaksi (order detail)
    public function orderDetail(){
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
}