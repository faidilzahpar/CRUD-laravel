<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin_products.index', compact('products'));
    }

    public function create()
    {
        return view('admin_products.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Tambahkan batasan ukuran dan tipe file
            'kategori' => 'required|string|max:255',
        ]);

        // Simpan gambar ke folder public/assets dengan nama asli
        $path = $request->file('gambar')->storeAs('assets', $request->file('gambar')->getClientOriginalName(), 'public');

        // Buat produk baru
        Product::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $path, // Simpan path gambar
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        return view('admin_products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Validasi input
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar bersifat opsional saat update
            'kategori' => 'required|string|max:255',
        ]);

        // Jika ada gambar baru, simpan gambar baru dengan nama asli
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->storeAs('assets', $request->file('gambar')->getClientOriginalName(), 'public');
            $product->gambar = $path; // Update path gambar
        }

        // Update informasi produk
        $product->nama_produk = $request->nama_produk;
        $product->deskripsi = $request->deskripsi;
        $product->harga = $request->harga;
        $product->kategori = $request->kategori;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        // Hapus produk
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}