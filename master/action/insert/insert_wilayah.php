<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $sql="INSERT INTO tb_wilayah (nama_wilayah) VALUES ('$nama');";
  mysqli_query($con,$sql);
  if($sql)
  {
    echo "<script language=javascript>
    alert('Data Berhasil Disimpan');
    location.href='../../../route.php?kode=data_wilayah';</script>";
  }
  else
  {
    echo"<script language=javascript> alert ('Gagal Tambah Data');history.back();</script>";
  }
}
// header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
