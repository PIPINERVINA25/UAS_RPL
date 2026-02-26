<?php
include "config/koneksi.php";
if(!isset($_SESSION['login'])) header("Location: login.php");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan Pastel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root {
            --pastel-blue: #A2D2FF;
            --pastel-green: #B9F3E4;
            --pastel-yellow: #FFF5E4;
            --pastel-pink: #FFD1E3;
            --text-dark: #555;
        }

        body {
            background-color: #fcfcfc;
            font-family: 'Quicksand', sans-serif; /* Font yang lebih bulat cocok untuk tema pastel */
            color: var(--text-dark);
        }

        .navbar {
            background-color: #ffffff !important;
            border-bottom: 2px solid var(--pastel-blue);
        }

        .navbar-brand, .nav-link {
            color: var(--text-dark) !important;
            font-weight: bold;
        }

        .card-menu {
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .card-menu:hover {
            transform: translateY(-8px);
        }

        /* Variasi Warna Pastel untuk Kartu */
        .bg-pastel-green { background-color: var(--pastel-green); }
        .bg-pastel-blue { background-color: var(--pastel-blue); }
        .bg-pastel-yellow { background-color: var(--pastel-yellow); }

        .icon-box {
            font-size: 3.5rem;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        .btn-custom {
            border-radius: 12px;
            border: none;
            padding: 10px;
            font-weight: 600;
            background-color: rgba(255, 255, 255, 0.5);
            color: var(--text-dark);
            transition: background 0.3s;
        }

        .btn-custom:hover {
            background-color: rgba(255, 255, 255, 0.8);
            color: #000;
        }

        .btn-logout {
            background-color: var(--pastel-pink);
            color: var(--text-dark);
            border-radius: 15px;
            font-weight: bold;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg mb-5 px-3">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fas fa-book-open text-info me-2"></i> E-Perpus <span class="text-muted fw-light">Admin</span>
        </a>
        <a href="logout.php" class="btn btn-logout px-4 shadow-sm">
            <i class="fas fa-power-off me-1"></i> Keluar
        </a>
    </div>
</nav>

<div class="container">
    <div class="row mb-5 text-center">
        <div class="col-12">
            <h1 class="fw-bold" style="color: #666;">Halo, Selamat Datang!</h1>
            <p class="fs-5 text-muted">Pilih menu di bawah untuk mulai mengelola perpustakaan.</p>
        </div>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card card-menu bg-pastel-green h-100 shadow-sm p-4 text-center">
                <div class="card-body">
                    <div class="icon-box text-success">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Data Buku</h4>
                    <p class="small opacity-75 mb-4">Total koleksi buku yang tersedia untuk dipinjam.</p>
                    <a href="buku.php" class="btn btn-custom w-100 stretched-link">Kelola Buku</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-menu bg-pastel-blue h-100 shadow-sm p-4 text-center">
                <div class="card-body">
                    <div class="icon-box text-primary">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Data Anggota</h4>
                    <p class="small opacity-75 mb-4">Data siswa dan staff yang terdaftar sebagai anggota.</p>
                    <a href="anggota.php" class="btn btn-custom w-100 stretched-link">Cek Anggota</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-menu bg-pastel-yellow h-100 shadow-sm p-4 text-center">
                <div class="card-body">
                    <div class="icon-box text-warning">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Peminjaman</h4>
                    <p class="small opacity-75 mb-4">Catatan sirkulasi peminjaman buku harian.</p>
                    <a href="peminjaman.php" class="btn btn-custom w-100 stretched-link">Input Transaksi</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5 py-4 text-center">
        <p class="text-muted small">Dibuat dengan ❤️ untuk Perpustakaan Digital &copy; 2024</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>