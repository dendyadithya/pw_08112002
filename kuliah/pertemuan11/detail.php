<?php
require 'functions.php';
$id = $_GET['id'];
$m = query("SELECT * FROM data WHERE id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <h3>Detail Mahasiswa</h3>

  <ul>
    <li><img src="img/<?= $m['gambar'] ?>" alt=""></li>
    <li>NRP : <?= $m['nrp'] ?></li>
    <li>Nama : <?= $m['nama'] ?></li>
    <li>Email : <?= $m['email'] ?></li>
    <li>Jurusan : <?= $m['jurusan'] ?></li>
    <li><a href="ubahdata.php?id=<?= $m['id']; ?>">Ubah</a> | <a href="hapus.php?id=<?= $m['id']; ?>" onclick="return confirm('apakah anda yakin ingin menghapus data <?= $m['nama']; ?>?');">Hapus</a></li>
    <li><a href=" index.php">Kembali ke daftar mahasiswa</a></li>
  </ul>


</body>

</html>