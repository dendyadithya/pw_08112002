<?php
function connection()
{
  return mysqli_connect('localhost', 'root', '', 'belajar_database');
}

function query($query)
{
  $conn = connection();
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambahData($data)
{
  $conn = connection();

  $nrp = htmlspecialchars($data['nrp']);
  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO `data` (`nrp`, `nama`, `email`, `jurusan`, `gambar`) VALUES ('$nrp', '$nama', '$email', '$jurusan', '$gambar');";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  // echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function hapusData($id)
{
  $conn = connection();
  mysqli_query($conn, "DELETE FROM data WHERE id=$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubahData($data)
{
  try {
    $conn = connection();

    $id = $data['id'];
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    $query = "UPDATE data SET nrp = '$nrp', nama = '$nama', email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE id=$id";

    mysqli_query($conn, $query) or die(mysqli_error($conn));
    return mysqli_affected_rows($conn);
  } catch (\Exception $e) {
    echo $e->getMessage();
  }
}
