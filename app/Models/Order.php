<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'order_id';

    protected $fillable = ['user_id', 'total_harga', 'status'];

    // Setiap user bisa melakukan transaksi sebanyak mungkin
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // Satu order dapat memiliki banyak order detail (produk/jasa yang dibeli)
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}

