<?php
include_once("../../../koneksi.php");
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $golongan = $_POST['golongan'];
  $id = $_POST['id'];
  $sql="UPDATE tb_ordo SET nama_ordo = '$nama', deskripsi_ordo = '$deskripsi',
  id_class = '$golongan' WHERE id_ordo = '$id';";
  mysqli_query($con,$sql);
  header("Location: ../../../master.php?kode=4.php");
}
?>
