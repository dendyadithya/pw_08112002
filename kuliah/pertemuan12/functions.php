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

function cariData($keyword)
{
  $conn = connection();

  $query = "SELECT * FROM data WHERE nama LIKE '%$keyword%'";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function login($data)
{
  $conn = connection();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
    if (password_verify($password, $user['password']))

      $_SESSION['login'] = true;
    header("Location: index.php");
    exit;
  }
  return [
    'error' => true,
    'message' => 'Username / Password Salah'
  ];
}

function registrasi($data)
{
  $conn = connection();

  $username = htmlspecialchars($data['username']);
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
    alert('Username dan Password tidak boleh kosong');
    document.location.href = 'registrasi.php';
  </script>";
    return false;
  }

  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
    alert('Username sudah terdaftar');
    document.location.href = 'registrasi.php';
  </script>";
    return false;
  }

  if ($password1 !== $password2) {
    echo "<script>
    alert('Password tidak sama');
    document.location.href = 'registrasi.php';
  </script>";
    return false;
  }

  if (strlen($password1) < 5) {
    echo "<script>
    alert('Password harus lebih dari 5 karakter');
    document.location.href = 'registrasi.php';
  </script>";
    return false;
  }

  $pattern = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/';
  if (!preg_match($pattern, $password1)) {
    echo "<script>
    alert('Password harus mengandung huruf besar dan symbol');
    document.location.href = 'registrasi.php';
  </script>";
    return false;
  }

  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  $query = "INSERT INTO `user` (`username`, `password`) VALUES ('$username', '$password_baru');";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
