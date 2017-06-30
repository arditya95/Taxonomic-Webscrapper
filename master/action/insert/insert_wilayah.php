<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $sql="INSERT INTO tb_wilayah (nama_wilayah) VALUES ('$nama');";
  mysqli_query($con,$sql);
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
