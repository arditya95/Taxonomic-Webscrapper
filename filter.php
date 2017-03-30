<?php
Include "koneksi.php";
$pilih = "SELECT * FROM tmp";
$hasil = mysqli_query($con,$pilih);
while ($row = mysqli_fetch_array($hasil))
{
    if ($row['th']=="Kingdom"){
        $sql = "INSERT INTO tb_kingdom (kingdom) SELECT td FROM tmp WHERE tmp.`id`=$row[id];";
      }

    elseif ($row['th']=="Phylum"){
        $sql = "INSERT INTO tb_phylum (phylum, id_kingdom) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      }

    elseif ($row['th']=="Class"){
        $sql = "INSERT INTO tb_class (class, id_phylum) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      }

    elseif ($row['th']=="Order"){
        $sql = "INSERT INTO tb_order (ordo, id_class) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      }

    elseif ($row['th']=="Family"){
        $sql = "INSERT INTO tb_family (family, id_order) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      }

    elseif ($row['th']=="Genus"){
        $sql = "INSERT INTO tb_genus (genus, id_family) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      }

    elseif ($row['th']=="Scientific Name"){
        $sql = "INSERT INTO tb_species (species, id_genus) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      }

    else{
        $sql = "GAGAL DIINPUT";
      }

  echo $row['id'] . " = " . $sql . "<br>";
  mysqli_query($con,$sql);
  $last_id = mysqli_insert_id($con);
  // $sql .= "TRUNCATE TABLE tmp;";
}
  echo "Selesai";
?>
