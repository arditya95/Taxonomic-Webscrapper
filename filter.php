<?php
Include "koneksi.php";
$pilih = "SELECT * FROM tmp";
$hasil = mysqli_query($con,$pilih);
while ($row = mysqli_fetch_array($hasil))
{
    if ($row['th']=="Kingdom"){
        $sql = "INSERT INTO tb_kingdom (nama_kingdom) SELECT td FROM tmp WHERE tmp.`id`=$row[id];";
      }

    elseif ($row['th']=="Phylum"){
        $sql = "INSERT INTO tb_phylum (nama_phylum, id_kingdom) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      }

    elseif ($row['th']=="Class"){
        $sql = "INSERT INTO tb_class (nama_class, id_phylum) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      }

    elseif ($row['th']=="Order"){
        $sql = "INSERT INTO tb_ordo (nama_ordo, id_class) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      }

    elseif ($row['th']=="Family"){
        $sql = "INSERT INTO tb_family (nama_family, id_ordo) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      }

    elseif ($row['th']=="Genus"){
        $sql = "INSERT INTO tb_genus (nama_genus, id_family) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      }

    elseif ($row['th']=="Scientific Name"){
        $sql = "INSERT INTO tb_species (nama_species, id_genus) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
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
