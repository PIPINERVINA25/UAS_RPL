<?php
include "config/koneksi.php";
if(!isset($_SESSION['login'])) header("Location: login.php");

if(isset($_POST['tambah'])){
    mysqli_query($conn,"INSERT INTO anggota VALUES ('','$_POST[nama]','$_POST[alamat]','$_POST[no_hp]')");
}

if(isset($_GET['hapus'])){
    mysqli_query($conn,"DELETE FROM anggota WHERE id='$_GET[hapus]'");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Data Anggota</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Data Anggota</h3>

<form method="POST" class="mb-3">
<input name="nama" placeholder="Nama" class="form-control mb-2" required>
<textarea name="alamat" placeholder="Alamat" class="form-control mb-2"></textarea>
<input name="no_hp" placeholder="No HP" class="form-control mb-2" required>
<button name="tambah" class="btn btn-primary">Tambah</button>
</form>

<table class="table table-bordered">
<tr>
<th>No</th>
<th>Nama</th>
<th>No HP</th>
<th>Aksi</th>
</tr>

<?php
$no=1;
$data = mysqli_query($conn,"SELECT * FROM anggota");
while($d=mysqli_fetch_array($data)){
?>
<tr>
<td><?= $no++; ?></td>
<td><?= $d['nama']; ?></td>
<td><?= $d['no_hp']; ?></td>
<td>
<a href="?hapus=<?= $d['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
</td>
</tr>
<?php } ?>
</table>

<a href="dashboard.php" class="btn btn-secondary">Kembali</a>

</body>
</html>