<?php
Include "koneksi.php";
$pilih = "SELECT * FROM tmp";
$hasil = mysqli_query($con,$pilih);
while ($row = mysqli_fetch_array($hasil))
{
  if ($row['th']=="Kingdom")
    {
      $sql = "INSERT INTO tb_kingdom (kingdom) SELECT td FROM tmp WHERE tmp.`id`=$row[id]";
      // var_dump($sql);
      // break;
    }
    elseif ($row['th']=="Phylum")
      {
        $sql = "INSERT INTO tb_phylum (phylum) SELECT td FROM tmp WHERE tmp.`id`=$row[id];";
      }
      elseif ($row['th']=="Class")
        {
          $sql = "INSERT INTO tb_class (class) SELECT td FROM tmp WHERE tmp.`id`=$row[id];";
        }
        elseif ($row['th']=="Order")
          {
            $sql = "INSERT INTO tb_order (ordo) SELECT td FROM tmp WHERE tmp.`id`=$row[id];";
          }
          elseif ($row['th']=="Family")
            {
              $sql = "INSERT INTO tb_family (family) SELECT td FROM tmp WHERE tmp.`id`=$row[id];";
            }
            elseif ($row['th']=="Genus")
              {
                $sql = "INSERT INTO tb_genus (genus) SELECT td FROM tmp WHERE tmp.`id`=$row[id];";
              }
              elseif ($row['th']=="Scientific Name")
                {
                  $sql = "INSERT INTO tb_species (species) SELECT td FROM tmp WHERE tmp.`id`=$row[id];";
                }
                else {
                  $sql = "GAGAL DIINPUT";
                }
                echo $row['id'] . " = " . $sql . "<br>";
                mysqli_query($con,$sql);
    // $sql .= "TRUNCATE TABLE tmp;";
}
echo "Selesai";
 ?>
