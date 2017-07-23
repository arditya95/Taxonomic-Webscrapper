<?php
include_once "../../setting/koneksi.php";
$sql="TRUNCATE TABLE `classify`.`tb_link`;";
mysqli_query($con,$sql);
// mysql_close($con);
if($sql)
{
  echo "<script language=javascript>
  alert('Data Berhasil Dibersihkan');
  location.href='../../index.php';</script>";
}
else
{
  echo"<script language=javascript> alert ('Gagal Tambah Data');history.back();</script>";
}
 ?>
