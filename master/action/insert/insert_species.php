<?php
include_once("../../../koneksi.php");
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $indonesia = $_POST['indonesia'];
  $inggris = $_POST['inggris'];
  $deskripsi = $_POST['deskripsi'];
  $golongan = $_POST['golongan'];
  $sql="INSERT INTO tb_species (nama_species, nama_indonesia, nama_english, deskripsi_species, id_genus) VALUES ('$nama', '$indonesia', '$inggris', '$deskripsi', '$golongan');";
  mysqli_query($con,$sql);
}
header("Location: ../../../master.php?kode=1.php");
?>
