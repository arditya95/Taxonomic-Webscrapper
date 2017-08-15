<?php
include_once "../../setting/koneksi.php";
$sql="SELECT * FROM information_schema.tables  WHERE table_schema='classify';";
$hasil=mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($hasil)){
  if ($row['TABLE_NAME']=='export_detail'||$row['TABLE_NAME']=='import_detail'||$row['TABLE_NAME']=='tb_link'||$row['TABLE_NAME']=='tb_referensi'||$row['TABLE_NAME']=='tb_user') {
    // $sql = "TRUNCATE TABLE `".$row['TABLE_NAME']."`";
    // echo "$sql <br>";
  } else {
    // $sql = "TRUNCATE TABLE `".$row['TABLE_NAME']."`";
    $sql = "DELETE FROM `".$row['TABLE_NAME']."`";
    echo "$sql <br>";
    $erase=mysqli_query($con,$sql);
    // var_dump($erase);
  }
    echo "<script language=javascript>
    alert('Data Berhasil Dibersihkan');
    location.href='../../index.php';</script>";
}
?>
