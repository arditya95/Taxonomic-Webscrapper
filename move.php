<?php
Include "koneksi.php";
$pilih = "SELECT * FROM tmp where id=9";
$hasil = mysqli_query($con,$pilih);
while ($row = mysqli_fetch_array($hasil)){
if ($row['isi']=="<div><!-- --></div>")
  {
    $sql = "INSERT INTO tb_kingdom (kingdom) SELECT isi FROM tmp WHERE tmp.`id`=1;";
    $sql .= "INSERT INTO tb_Phylum (phylum) SELECT isi FROM tmp WHERE tmp.`id`=2;";
    $sql .= "INSERT INTO tb_class (class) SELECT isi FROM tmp WHERE tmp.`id`=3;";
    $sql .= "INSERT INTO tb_order (ordo) SELECT isi FROM tmp WHERE tmp.`id`=4;";
    $sql .= "INSERT INTO tb_family (family) SELECT isi FROM tmp WHERE tmp.`id`=5;";
    $sql .= "INSERT INTO tb_genus (genus) SELECT isi FROM tmp WHERE tmp.`id`=6;";
    $sql .= "INSERT INTO tb_species (species) SELECT isi FROM tmp WHERE tmp.`id`=7;";
    $sql .= "TRUNCATE TABLE tmp;";

    if (mysqli_multi_query($con,$sql))
    {
      do
        {
        // Store first result set
        if ($result=mysqli_store_result($con)) {
          // Fetch one and one row
          while ($row=mysqli_fetch_row($result))
            {
            printf("%s\n",$row[0]);
            }
          // Free result set
          mysqli_free_result($result);
          }
        }
      while (mysqli_next_result($con));
    }
  }

}
echo "Selesai";
 ?>
