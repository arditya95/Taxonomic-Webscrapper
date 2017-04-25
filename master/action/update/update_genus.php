<?php
include_once("../../../koneksi.php");
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $golongan = $_POST['golongan'];
  $id = $_POST['id'];
  $sql="UPDATE tb_genus SET nama_genus = '$nama', deskripsi_genus = '$deskripsi',
  id_family = '$golongan' WHERE id_genus = '$id';";
  mysqli_query($con,$sql);
  header("Location: ../../../master.php?kode=2.php");
}
?>
