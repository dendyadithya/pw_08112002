<?php
require 'functions.php';

$id = $_GET['id'];

if (hapusData($id) > 0) {
  echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'index.php';
  </script>";
} else {
  echo "Data Tidak Berhasil dihapus";
}
