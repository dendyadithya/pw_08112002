<?php

require 'functions.php';

if (isset($_POST['registrasi'])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
    alert('Registrasi Berhasil, silahkan Login');
    document.location.href = 'login.php';
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
  <title>Registrasi</title>
</head>

<body>
  <h3>Form Registrasi</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Username :
          <input type="text" name="username" autocomplete="off" required>
        </label>
      </li>
      <br>
      <li>
        <label>
          Passsword :
          <input type="text" name="password1" autocomplete="off" required>
        </label>
      </li>
      <br>
      <li>
        <label>
          Konfirmasi Passsword :
          <input type="text" name="password2" autocomplete="off" required>
        </label>
      </li>
      <br>
      <li>
        <button type="submit" name="registrasi">Registrasi</button>
      </li>
    </ul>
  </form>
</body>

</html>