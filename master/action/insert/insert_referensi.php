<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $sql="INSERT INTO tb_referensi (link) VALUES ('$nama');";
  mysqli_query($con,$sql);
}
header("Location: ../../../route.php?kode=11.php");
?>
