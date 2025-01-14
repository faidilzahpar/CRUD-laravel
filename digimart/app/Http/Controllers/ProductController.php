<?php

namespace App\Http\Controllers;

use App\Models\Product; // pastikan model Product sudah dibuat
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil semua data produk
        $products = Product::all();
    
        // Mengirim data produk ke view
        return view('index', compact('products'));
    }
}