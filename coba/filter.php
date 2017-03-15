<?php
include 'koneksi.php';
$select = "SELECT * FROM tmp";
$hasil  = mysqli_query($con, $select);
while ($row = mysqli_fetch_array($hasil))
  {
    if ($row['isi'] )
      {

      }
  }
?>
