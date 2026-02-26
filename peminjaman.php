<?php
include "config/koneksi.php";
if(!isset($_SESSION['login'])) header("Location: login.php");

if(isset($_POST['pinjam'])){
    mysqli_query($conn,"INSERT INTO peminjaman VALUES ('','$_POST[anggota]','$_POST[buku]','$_POST[tgl_pinjam]','$_POST[tgl_kembali]','Dipinjam')");
    mysqli_query($conn,"UPDATE buku SET stok=stok-1 WHERE id='$_POST[buku]'");
}

if(isset($_GET['kembali'])){
    mysqli_query($conn,"UPDATE peminjaman SET status='Dikembalikan' WHERE id='$_GET[kembali]'");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Peminjaman</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Transaksi Peminjaman</h3>

<form method="POST" class="mb-3">
<select name="anggota" class="form-control mb-2">
<?php
$a=mysqli_query($conn,"SELECT * FROM anggota");
while($d=mysqli_fetch_array($a)){
echo "<option value='$d[id]'>$d[nama]</option>";
}
?>
</select>

<select name="buku" class="form-control mb-2">
<?php
$b=mysqli_query($conn,"SELECT * FROM buku WHERE stok>0");
while($d=mysqli_fetch_array($b)){
echo "<option value='$d[id]'>$d[judul]</option>";
}
?>
</select>

<input type="date" name="tgl_pinjam" class="form-control mb-2" required>
<input type="date" name="tgl_kembali" class="form-control mb-2" required>

<button name="pinjam" class="btn btn-primary">Pinjam</button>
</form>

<table class="table table-bordered">
<tr>
<th>No</th>
<th>Anggota</th>
<th>Buku</th>
<th>Status</th>
<th>Aksi</th>
</tr>

<?php
$no=1;
$data=mysqli_query($conn,"SELECT p.*, a.nama, b.judul FROM peminjaman p
JOIN anggota a ON p.id_anggota=a.id
JOIN buku b ON p.id_buku=b.id");

while($d=mysqli_fetch_array($data)){
?>
<tr>
<td><?= $no++; ?></td>
<td><?= $d['nama']; ?></td>
<td><?= $d['judul']; ?></td>
<td><?= $d['status']; ?></td>
<td>
<?php if($d['status']=="Dipinjam"){ ?>
<a href="?kembali=<?= $d['id']; ?>" class="btn btn-success btn-sm">Kembalikan</a>
<?php } ?>
</td>
</tr>
<?php } ?>
</table>

<a href="dashboard.php" class="btn btn-secondary">Kembali</a>

</body>
</html>