<?php
include_once("../../../koneksi.php");
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $id = $_POST['id'];
  $sql="UPDATE tb_kingdom SET nama_kingdom = '$nama', deskripsi_kingdom = '$deskripsi'
  WHERE id_kingdom = '$id';";
  mysqli_query($con,$sql);
  header("Location: ../../../master.php?kode=7.php");
}
?>
