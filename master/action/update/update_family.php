<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $golongan = $_POST['golongan'];
  $id = $_POST['id'];
  $sql="UPDATE tb_family SET nama_family = '$nama', deskripsi_family = '$deskripsi',
  id_ordo = '$golongan' WHERE id_family = '$id';";
  mysqli_query($con,$sql);
  header("Location: ../../../route.php?kode=3.php");
}
?>
