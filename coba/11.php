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
          echo "print row td : ". $row['td'] ."<br>";
          $sqlcek="SELECT * from tb_kingdom where nama_kingdom='$row[td]'";
          $hasilcek = mysqli_query($con,$sqlcek);
          echo "print sql cek : " .$sqlcek . "<br>";
          $row_coun=mysqli_num_rows($hasilcek);
          echo "jumlah ROW : ". $row_coun . "<br>";
          if ($row_coun==1) {
            $sqlid_kingdom="SELECT id_kingdom FROM tb_kingdom where nama_kingdom='$row[td]'";
            $hasil_id = mysqli_query($con,$sqlid_kingdom);
            echo "id yang di ambil : ". $hasil_id. "<br>";
          }else {
            $sql = "INSERT INTO tb_kingdom (nama_kingdom) SELECT td FROM tmp WHERE tmp.`id`=$row[id];";
            echo $sql . "<br>";
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
