<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    // Tambahkan ini biar bisa simpan data pengeluaran
    protected $fillable = [
        'name',
        'amount',
        'date',
        'description'
    ];
}