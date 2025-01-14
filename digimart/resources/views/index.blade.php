<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce Produk Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @media (max-width: 768px) {
            .auth {
                padding-top: 20px;
                justify-content: center !important;
            }
            .garis {
                display: none;
            }
        }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md bg-body-tertiary sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"> <img src="https://via.placeholder.com/350x150 alt="Logo" width="30" height="30" class="d-inline-block align-text-top"> </a>
        <!-- Search -->
        <div class="col-md-6 mx-auto">
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Cari disini" aria-label="Search" />
            <button class="btn btn-outline-primary" type="submit"><span><i class='bx bx-search'></i></span></button>
          </form>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#populer">Produk</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="ebook.html">E-book</a></li>
                <li><a class="dropdown-item" href="#">Kelas online</a></li>
                <li><a class="dropdown-item" href="#">Template desain</a></li>
                <li><a class="dropdown-item" href="#">Asset desain</a></li>
              </ul>
            </li> 
          </ul>
        </div>
            <div class="auth w-100 d-flex justify-content-end">
            <span class="garis border-start mx-2" style="height: 30px;"></span>
            <button class="btn btn-outline-primary mx-1" type="login">Masuk</button>
            <button class="btn btn-primary mx-1" type="Register">Daftar</button>
            </div>
      </div>
    </nav>

    <!-- Hero Section -->
<div class="container text-center my-5" id="home">
    <h1 class="display-4">Selamat Datang di DigiMart</h1>
    <p class="lead">Platform terbaik untuk produk digital seperti e-book, template, dan kelas online.</p>
    <a href="#populer" class="btn btn-primary btn-lg">Jelajahi Sekarang</a>
</div>

<!-- Produk Section -->
<div class="container my-5" id="populer">
    <h2 class="text-center mb-4">Produk Digital Terpopuler</h2>
    <div class="row g-4">
        <!-- Loop untuk menampilkan produk -->
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card" style="height: 480px;">
                    <div class="img-container" style="height: 280px; overflow: hidden;">
                        <!-- Gambar diambil dari path yang disimpan di database -->
                        <img src="{{ asset($product->gambar) }}" class="card-img-top" alt="{{ $product->nama_produk }}" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->nama_produk }}</h5>
                        <p class="card-text" style="overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 2; max-height: 3em; line-height: 1.5em; margin: 0;">
                            {{ $product->deskripsi }}
                        </p>
                        <h5 class="harga">Rp. {{ number_format($product->harga, 0, ',', '.') }}</h5>
                        <a href="#" class="btn btn-primary mt-2">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

    <!-- Footer -->
    <footer class="text-center py-4 bg-primary text-light">
      <p>&copy; 2025 DigiMart. Semua Hak Dilindungi.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
