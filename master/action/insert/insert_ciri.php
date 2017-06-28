<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $sql="INSERT INTO tb_ciri (ciri, deskripsi_ciri) VALUES ('$nama','$deskripsi');";
  mysqli_query($con,$sql);
}
header("Location: ../../../route.php?kode=8.php");
?>
