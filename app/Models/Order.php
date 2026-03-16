<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders'; 

    // 'customer' WAJIB ada di sini biar bisa kesimpen ke DB
    protected $fillable = [
        'customer', 
        'total_price', 
        'created_at'
    ];

    public function items()
{
    // Ganti OrderItem jadi OrderDetail
    return $this->hasMany(OrderDetail::class); 
}
}