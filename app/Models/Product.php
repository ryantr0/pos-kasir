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
        'stock',      // Izin simpan stok
        'image',
        'category_id', 
        'is_ready'    
    ];

    protected $casts = [
        'price'    => 'integer',
        'stock'    => 'integer', // TAMBAHKAN INI: Biar dihitungnya enak (nggak jadi string)
        'is_ready' => 'boolean' 
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIP
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR
    |--------------------------------------------------------------------------
    */

    public function getImageUrlAttribute()
    {
        if ($this->image && file_exists(storage_path('app/public/' . $this->image))) {
            return asset('storage/' . $this->image);
        }

        return asset('images/no-image.png');
    }
}