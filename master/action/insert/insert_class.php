<?php
include_once("../../../koneksi.php");
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $golongan = $_POST['golongan'];
  $sql="INSERT INTO tb_class (nama_class, deskripsi_class, id_phylum) VALUES ('$nama','$deskripsi', '$golongan');";
  mysqli_query($con,$sql);
}
header("Location: ../../../master.php?kode=5.php");
?>
