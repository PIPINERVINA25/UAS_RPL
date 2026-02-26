<?php
include "config/koneksi.php";
if(!isset($_SESSION['login'])) header("Location: login.php");

if(isset($_POST['tambah'])){
    mysqli_query($conn,"INSERT INTO buku VALUES ('','$_POST[judul]','$_POST[pengarang]','$_POST[penerbit]','$_POST[tahun]','$_POST[stok]')");
}

if(isset($_GET['hapus'])){
    mysqli_query($conn,"DELETE FROM buku WHERE id='$_GET[hapus]'");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Buku</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h3>Data Buku</h3>

<form method="POST" class="mb-3">
<input name="judul" placeholder="Judul" class="form-control mb-2" required>
<input name="pengarang" placeholder="Pengarang" class="form-control mb-2" required>
<input name="penerbit" placeholder="Penerbit" class="form-control mb-2" required>
<input name="tahun" placeholder="Tahun" class="form-control mb-2" required>
<input name="stok" placeholder="Stok" class="form-control mb-2" required>
<button name="tambah" class="btn btn-primary">Tambah</button>
</form>

<table class="table table-bordered">
<tr>
<th>No</th>
<th>Judul</th>
<th>Pengarang</th>
<th>Stok</th>
<th>Aksi</th>
</tr>

<?php
$no=1;
$data = mysqli_query($conn,"SELECT * FROM buku");
while($d=mysqli_fetch_array($data)){
?>
<tr>
<td><?= $no++; ?></td>
<td><?= $d['judul']; ?></td>
<td><?= $d['pengarang']; ?></td>
<td><?= $d['stok']; ?></td>
<td>
<a href="?hapus=<?= $d['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
</td>
</tr>
<?php } ?>
</table>

<a href="dashboard.php" class="btn btn-secondary">Kembali</a>

</body>
</html>