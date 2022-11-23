<?php
require_once 'functions.php';

$id = $_GET['id'];
$m = query("SELECT * FROM data WHERE id=$id");

if (isset($_POST['ubah'])) {
  if (ubahData($_POST) > 0) {
    echo "<script>
      alert('data berhasil diubah');
      document.location.href = 'index.php';
    </script>";
  } else {
    echo "<script>
      alert('data tidak berhasil diubah');
    </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h3>Form Ubah Data Mahasiswa</h3>

  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $m['id']; ?>">
    <ul>
      <li><label>NRP :
          <input type="text" name="nrp" autofocus required value="<?= $m['nrp']; ?>">
        </label></li>
      <br>
      <li><label>Nama :
          <input type="text" name="nama" required value="<?= $m['nama']; ?>">
        </label></li>
      <br>
      <li><label>Email :
          <input type="text" name="email" required value="<?= $m['email']; ?>">
        </label></li>
      <br>
      <li><label>Jurusan :
          <input type="text" name="jurusan" required value="<?= $m['jurusan']; ?>">
        </label></li>
      <br>
      <li><label>Gambar :
          <input type="text" name="gambar" required value="<?= $m['gambar']; ?>">
        </label></li>
      <br>
      <li><button type="submit" name="ubah">Ubah Data</button></li>
      <br><br>
      <li><a href="index.php">Kembali ke daftar mahasiswa</a></li>
    </ul>
  </form>
</body>

</html>