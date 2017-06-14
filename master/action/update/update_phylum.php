<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $golongan = $_POST['golongan'];
  $id = $_POST['id'];
  $sql="UPDATE tb_phylum SET nama_phylum = '$nama', deskripsi_phylum = '$deskripsi',
  id_kingdom = '$golongan' WHERE id_phylum = '$id';";
  mysqli_query($con,$sql);
  header("Location: ../../../route.php?kode=6.php");
}
?>
