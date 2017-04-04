<?php
include_once("../../../koneksi.php");
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $deskripsi = $_POST['deskripsi'];
  $sql="INSERT INTO tb_kingdom (nama_kingdom, deskripsi_kingdom) VALUES ('$nama','$deskripsi');";
  mysqli_query($con,$sql);
}
?>
