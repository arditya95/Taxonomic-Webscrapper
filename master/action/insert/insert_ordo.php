<?php
include_once("../../../koneksi.php");
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $golongan = $_POST['golongan'];
  $sql="INSERT INTO tb_ordo (nama_ordo, deskripsi_ordo, id_class) VALUES ('$nama','$deskripsi', '$golongan');";
  mysqli_query($con,$sql);
}
?>
