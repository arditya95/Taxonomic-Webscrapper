<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $id = $_POST['id'];
  $sql="UPDATE tb_habitat SET habitat = '$nama'
  WHERE id_habitat = '$id';";
  mysqli_query($con,$sql);
  header("Location: ../../../route.php?kode=9.php");
}
?>
