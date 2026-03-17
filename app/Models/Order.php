<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Tambahan untuk relasi
use Illuminate\Database\Eloquent\Relations\HasMany;  // Tambahan untuk relasi

class Order extends Model
{
    protected $table = 'orders'; 

    // Tambahkan user_id di sini biar bisa diisi lewat Controller
    protected $fillable = [
        'customer', 
        'total_price', 
        'user_id', 
        'payment_method', // <--- SUDAH SAYA TAMBAHKAN, JANGAN DIHAPUS BANG
        'created_at'
    ];

    /**
     * Relasi ke model User (Kasir)
     * Biar abang bisa panggil $order->user->name
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke detail item pesanan
     */
    public function items(): HasMany
    {
        // Ganti OrderItem jadi OrderDetail (sudah benar)
        return $this->hasMany(OrderDetail::class); 
    }
}