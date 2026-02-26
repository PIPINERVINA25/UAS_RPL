<?php
include "config/koneksi.php";
// Pastikan session sudah dimulai jika belum ada di koneksi.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $data = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($data);

    if($cek > 0){
        $_SESSION['login'] = true;
        header("Location: dashboard.php");
        exit;
    }else{
        echo "<script>alert('Login gagal! Periksa kembali username & password.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Perpus Pastel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #FFD1E3; /* Pastel Pink Background */
            font-family: 'Quicksand', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-card {
            background: white;
            padding: 2.5rem;
            border-radius: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 400px;
            border: none;
        }
        .login-card h3 {
            color: #555;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .form-control {
            border-radius: 15px;
            padding: 12px 20px;
            border: 2px solid #f0f0f0;
            background-color: #fcfcfc;
        }
        .form-control:focus {
            border-color: #A2D2FF;
            box-shadow: none;
            background-color: #fff;
        }
        .btn-login {
            background-color: #A2D2FF; /* Pastel Blue */
            border: none;
            border-radius: 15px;
            padding: 12px;
            width: 100%;
            font-weight: 700;
            color: #555;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }
        .btn-login:hover {
            background-color: #B9F3E4; /* Change to Pastel Green on Hover */
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(162, 210, 255, 0.4);
        }
        .icon-header {
            font-size: 3rem;
            color: #A2D2FF;
            display: block;
            text-align: center;
            margin-bottom: 10px;
        }
        .footer-text {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.85rem;
            color: #aaa;
        }
    </style>
</head>
<body>

<div class="login-card shadow">
    <div class="icon-header">
        <i class="fas fa-book-reader"></i>
    </div>
    <h3>E-Perpus Login</h3>
    
    <form method="POST">
        <div class="mb-3">
            <label class="form-label text-muted small ms-2">Username</label>
            <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0" style="border-radius: 15px 0 0 15px;"><i class="fas fa-user text-muted"></i></span>
                <input type="text" name="username" class="form-control border-start-0" placeholder="Masukkan username" style="border-radius: 0 15px 15px 0;" required>
            </div>
        </div>
        
        <div class="mb-4">
            <label class="form-label text-muted small ms-2">Password</label>
            <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0" style="border-radius: 15px 0 0 15px;"><i class="fas fa-lock text-muted"></i></span>
                <input type="password" name="password" class="form-control border-start-0" placeholder="Masukkan password" style="border-radius: 0 15px 15px 0;" required>
            </div>
        </div>
        
        <button name="login" class="btn btn-login shadow-sm">
            Masuk Sekarang <i class="fas fa-arrow-right ms-2"></i>
        </button>
    </form>
    
    <div class="footer-text">
        &copy; 2024 Manajemen Perpustakaan
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>