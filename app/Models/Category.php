<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'categories';

    // Kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'name',
        'slug'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    /**
     * Relasi ke Produk (Satu kategori punya banyak produk)
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}