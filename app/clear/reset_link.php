<?php
include_once "../../setting/koneksi.php";
$sql="UPDATE tb_link SET label=0 WHERE label=1";
mysqli_query($con,$sql);
if($sql)
{
  echo "<script language=javascript>
  alert('Data Berhasil Direfresh');
  location.href='../../index.php';</script>";
}
else
{
  echo"<script language=javascript> alert ('Gagal Tambah Data');history.back();</script>";
}
?>
