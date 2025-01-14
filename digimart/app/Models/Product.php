<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan konvensi penamaan
    protected $table = 'products';

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'gambar',
        'kategori',
    ];
    public $timestamps = false; // Nonaktifkan timestamps
}