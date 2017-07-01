<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $taxon = $_POST['taxon'];
  $ciri = $_POST['ciri'];
  $deskripsi = $_POST['deskripsi'];
  $referensi = $_POST['referensi'];
  $idt = $_POST['idt'];
  $idc = $_POST['idc'];
  $sql="UPDATE tb_ciri_kingdom SET id_kingdom = '$taxon', id_ciri = '$ciri', keterangan_ckingdom = '$deskripsi', id_referensi = '$referensi'
        WHERE id_kingdom = '$idt' AND id_ciri = '$idt';";
  mysqli_query($con,$sql);
  if($sql)
  {
    echo "<script language=javascript>
    alert('Data Berhasil Disimpan');
    location.href='../../../route.php?kode=data_kingdom';</script>";
  }
  else
  {
    echo"<script language=javascript> alert ('Gagal Tambah Data');history.back();</script>";
  }
}
// header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
