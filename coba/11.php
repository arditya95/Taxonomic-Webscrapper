<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cek Filter</title>
  </head>
  <body>
    <?php
    Include "koneksi.php";
    $pilih = "SELECT * FROM tmp";
    $hasil = mysqli_query($con,$pilih);
    while ($row = mysqli_fetch_array($hasil))
    {
        if ($row['th']=="Kingdom"){
          $sql_cek_kingdom="SELECT * from tb_kingdom where nama_kingdom='$row[td]'";
          $hasil_cek_kingdom = mysqli_query($con,$sql_cek_kingdom);
          $row_coun=mysqli_num_rows($hasil_cek_kingdom);
          // echo "print row td : ". $row['td'] ."<br>";
          // echo "print sql cek : " .$sql_cek_kingdom . "<br>";
          // echo "jumlah ROW : ". $row_coun . "<br>";
            if ($row_coun==1) {
              $sql_id_kingdom="SELECT * FROM tb_kingdom where nama_kingdom='$row[td]'";
              $hasil_id_kingdom = mysqli_query($con,$sql_id_kingdom);
              // while ($rowid = mysqli_fetch_array($hasil_id_kingdom))
              // {
              //   echo "id yang di ambil : ". $rowid['id_kingdom']. "<br>";
              // }
            }
            else {
              $sql_input_kingdom = "INSERT INTO tb_kingdom (nama_kingdom) SELECT td FROM tmp WHERE tmp.`id`=$row[id];";
              $input_kingdom = mysqli_query($con,$sql_input_kingdom);
              $last_id_kingdom = mysqli_insert_id($con);
              // echo $sql_input_kingdom . "<br>";
              // echo "Last id yang di ambil : ". $last_id_kingdom. "<br>";
            }
            echo "<br>";
          }

      //   elseif ($row['th']=="Phylum"){
      //       $sql = "INSERT INTO tb_phylum (nama_phylum, id_kingdom) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      //     }
      //
      //   elseif ($row['th']=="Class"){
      //       $sql = "INSERT INTO tb_class (nama_class, id_phylum) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      //     }
      //
      //   elseif ($row['th']=="Order"){
      //       $sql = "INSERT INTO tb_ordo (nama_ordo, id_class) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      //     }
      //
      //   elseif ($row['th']=="Family"){
      //       $sql = "INSERT INTO tb_family (nama_family, id_ordo) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      //     }
      //
      //   elseif ($row['th']=="Genus"){
      //       $sql = "INSERT INTO tb_genus (nama_genus, id_family) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      //     }
      //
      //   elseif ($row['th']=="Scientific Name"){
      //       $sql = "INSERT INTO tb_species (nama_species, id_genus) SELECT td, $last_id FROM tmp WHERE tmp.`id`=$row[id];";
      //     }
      //
      //   else{
      //       $sql = "GAGAL DIINPUT";
      //     }
      //
      // echo $row['id'] . " = " . $sql . "<br>";
      // mysqli_query($con,$sql);
      // $last_id = mysqli_insert_id($con);
      // // $sql .= "TRUNCATE TABLE tmp;";
    }
      echo "Selesai";
    ?>

  </body>
</html>
