<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'user_id';

    protected $fillable = ['nama', 'email', 'password'];

    protected $hidden = ['password'];

    protected $casts = ['password' => 'hashed'];

    // Seorang user dapat memiliki banyak transaksi (orders)
    public function orders(){
        return $this->hasMany(Order::class, 'user_id');
    }

    // Seorang user dapat memiliki banyak keranjang belanja (carts)
    public function carts(){
        return $this->hasMany(Cart::class, 'user_id');
    }
}
