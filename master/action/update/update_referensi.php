<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $id = $_POST['id'];
  $sql="UPDATE tb_referensi SET link = '$nama'
  WHERE id_referensi = '$id';";
  mysqli_query($con,$sql);
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
