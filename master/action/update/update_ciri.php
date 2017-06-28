<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $id = $_POST['id'];
  $sql="UPDATE tb_ciri SET ciri = '$nama', deskripsi_ciri = '$deskripsi'
  WHERE id_ciri = '$id';";
  mysqli_query($con,$sql);
  header("Location: ../../../route.php?kode=8.php");
}
?>
