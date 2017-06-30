<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $taxon = $_POST['taxon'];
  $ciri = $_POST['ciri'];
  $deskripsi = $_POST['deskripsi'];
  $referensi = $_POST['referensi'];
  $sql="INSERT INTO tb_ciri_species (id_species, id_ciri, keterangan_cspecies, id_referensi) VALUES ('$taxon', '$ciri', '$deskripsi', '$referensi');";
  mysqli_query($con,$sql);
  if($sql)
  {
    echo "<script language=javascript>
    alert('Data Berhasil Disimpan');
    location.href='../../../route.php?kode=data_species';</script>";
  }
  else
  {
    echo"<script language=javascript> alert ('Gagal Tambah Data');history.back();</script>";
  }
}
// header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
