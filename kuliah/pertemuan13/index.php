<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM data");

if (isset($_POST['cari'])) {
  $mahasiswa = cariData($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <a href="logout.php">Logout</a>
  <h3>Daftar Mahasiswa</h3>

  <a href="tambahdata.php">Tambah data mahasiswa</a>
  <br><br>

  <form action="" method="POST">
    <input type="name" name="keyword" size="40" placeholder="cari" autocomplete="off" class="keyword">
    <button type="submit" name="cari" class="tombol-cari">Cari</button>
  </form>
  <br>

  <div class="container">
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>

      <?php if (empty($mahasiswa)) : ?>
        <tr>
          <td colspan="4">
            <p>Data Tidak Ditemukan</p>
          </td>
        </tr>
      <?php endif; ?>

      <?php $i = 1;
      foreach ($mahasiswa as $m) : ?>
        <tr>
          <td><?= $i++ ?></td>
          <td><img src="img/<?= $m['gambar'] ?>" alt="" width="60"></td>
          <td><?= $m['nama'] ?></td>
          <td><a href="detail.php?id=<?= $m['id']; ?>">Lihat Detail</a></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <script src="js/script.js"></script>
</body>

</html>