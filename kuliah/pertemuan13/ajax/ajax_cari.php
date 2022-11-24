<?php
require '../functions.php';
$mahasiswa = cariData($_GET['keyword']);
?>

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