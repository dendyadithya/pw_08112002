<?php
require_once 'functions.php';

if (isset($_POST['tambah'])) {
  // tambah($_POST);
  var_dump($_POST);
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

  <form action="" method="POST"></form>
  <ul>
    <li><label>NRP :
        <input type="text" name="nrp" autofocus>
      </label></li>
    <li><label>Nama :
        <input type="text" name="nama">
      </label></li>
    <li><label>Email :
        <input type="text" name="email">
      </label></li>
    <li><label>Jurusan :
        <input type="text" name="jurusan">
      </label></li>
    <li><label>Gambar :
        <input type="text" name="gambar">
      </label></li>
    <li><button type="submit" name="tambah">Tambah Data</button></li>
  </ul>
</body>

</html>