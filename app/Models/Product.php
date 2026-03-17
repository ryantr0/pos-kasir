<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id', // Pakai category_id supaya nyambung ke tabel categories
        'is_ready'     // TAMBAHKAN INI: Agar status stok bisa tersimpan di database
    ];

    protected $casts = [
        'price'    => 'integer',
        'is_ready' => 'boolean' // TAMBAHKAN INI: Agar otomatis jadi True/False saat dipanggil di JS
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    /**
     * Relasi ke Kategori (Banyak produk punya satu kategori)
     */
    public function category()
    {
        // Menghubungkan ke model Category
        return $this->belongsTo(Category::class, 'category_id');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR
    |--------------------------------------------------------------------------
    */

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        return asset('images/no-image.png');
    }
}