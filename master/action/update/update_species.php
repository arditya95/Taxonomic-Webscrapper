<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $indonesia = $_POST['indonesia'];
  $inggris = $_POST['inggris'];
  $deskripsi = $_POST['deskripsi'];
  $golongan = $_POST['golongan'];
  $id = $_POST['id'];
  $sql="UPDATE tb_species SET nama_species = '$nama', nama_indonesia = '$indonesia',
  nama_english = '$inggris', deskripsi_species = '$deskripsi', id_genus = '$golongan' WHERE id_species = '$id';";
  mysqli_query($con,$sql);
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
