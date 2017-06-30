<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $id = $_POST['id'];
  $sql="UPDATE tb_wilayah SET nama_wilayah = '$nama'
  WHERE id_wilayah = '$id';";
  mysqli_query($con,$sql);
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
