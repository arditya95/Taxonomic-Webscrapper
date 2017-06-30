<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $golongan = $_POST['golongan'];
  $id = $_POST['id'];
  $sql="UPDATE tb_class SET nama_class = '$nama', deskripsi_class = '$deskripsi',
  id_phylum = '$golongan' WHERE id_class = '$id';";
  mysqli_query($con,$sql);
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
