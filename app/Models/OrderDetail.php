<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'orderdetail_id';

    protected $fillable = ['order_id', 'product_id', 'jumlah', 'harga'];

    // Satu detail transaksi dimiliki oleh satu order  
    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Satu detail transaksi berisi satu produk (dengan jumlah tertentu)
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}