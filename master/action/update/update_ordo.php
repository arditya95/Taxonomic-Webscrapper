<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $golongan = $_POST['golongan'];
  $id = $_POST['id'];
  $sql="UPDATE tb_ordo SET nama_ordo = '$nama', deskripsi_ordo = '$deskripsi',
  id_class = '$golongan' WHERE id_ordo = '$id';";
  mysqli_query($con,$sql);
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
