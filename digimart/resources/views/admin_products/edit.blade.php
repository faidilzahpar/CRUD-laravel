@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Produk</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $product->nama_produk }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $product->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $product->harga }}" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (Kosongkan jika tidak ingin mengubah)</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
        </div>
        <div class="mb-3">
            <img src="{{ asset($product->gambar) }}" alt="{{ $product->nama_produk }}" width="100">
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $product->kategori }}" required>
        </div>
        <button type="submit" class="btn btn-primary mb-4">Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mb-4">Kembali</a>
    </form>
</div>
@endsection