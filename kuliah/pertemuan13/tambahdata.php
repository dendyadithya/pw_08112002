<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require_once 'functions.php';

if (isset($_POST['tambah'])) {
  if (tambahData($_POST) > 0) {
    echo "<script>
      alert('data berhasil ditambahkan');
      document.location.href = 'index.php';
    </script>";
  } else {
    echo "Data Tidak Berhasil ditambahkan";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <h3>Form Tambah Data Mahasiswa</h3>

  <form action="" method="POST" enctype="multipart/form-data">
    <ul>
      <li><label>NRP :
          <input type="text" name="nrp" autofocus required>
        </label></li>
      <br>
      <li><label>Nama :
          <input type="text" name="nama" required>
        </label></li>
      <br>
      <li><label>Email :
          <input type="text" name="email" required>
        </label></li>
      <br>
      <li><label>Jurusan :
          <input type="text" name="jurusan" required>
        </label></li>
      <br>
      <li><label>Gambar :
          <input type="file" name="gambar">
        </label></li>
      <br>
      <li><button type="submit" name="tambah">Tambah Data</button></li>
      <br><br>
      <li><a href="index.php">Kembali ke daftar mahasiswa</a></li>
    </ul>
  </form>
</body>

</html>