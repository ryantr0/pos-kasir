<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
    'item_name', 
    'qty', 
    'description',
    'purchase_price', 
    'total_price', 
    'purchase_date'
];

    // Relasi ke Produk biar bisa tau barang apa yang dibeli
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
