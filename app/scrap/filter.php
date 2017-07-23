<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cek Filter</title>
  </head>
  <body>
    <?php
    // error_reporting(0);
    // set_time_limit(0);
    // $start = microtime(true);

    include_once "../../setting/koneksi.php";
    $pilih = "SELECT * FROM tmp";
    $hasil = mysqli_query($con,$pilih);
    while ($row = mysqli_fetch_array($hasil))
    {
        if ($row['th']=="Kingdom"){
          $sql_cek="SELECT * from tb_kingdom where nama_kingdom='$row[td]'";
          $hasil_cek = mysqli_query($con,$sql_cek);
          $row_coun=mysqli_num_rows($hasil_cek);
          // echo "[Kingdom] Print Row td : ". $row['td'] ."<br>";
          // echo "[Kingdom] Print SQL Cek : " .$sql_cek . "<br>";
          // echo "[Kingdom] Jumlah ROW : ". $row_coun . "<br>";
            if ($row_coun==1) {
              while ($rowid = mysqli_fetch_array($hasil_cek))
              {
                $use_id_kingdom = $rowid['id_kingdom'];
                // echo "[Kingdom] ID yang Diambil : ". $use_id_kingdom. "<br>";
              }
            }
            else {
              $sql_input = "INSERT INTO tb_kingdom (nama_kingdom) SELECT td FROM tmp WHERE tmp.`id`=$row[id];";
              $new_input = mysqli_query($con,$sql_input);
              $use_id_kingdom = mysqli_insert_id($con);
              // echo "[Kingdom] Print SQL New Input : ".$sql_input . "<br>";
              // echo "[Kingdom] Last ID yang Diambil : ". $use_id_kingdom. "<br>";
            }
            // echo "<br>";
          }

        elseif ($row['th']=="Phylum"){
          $sql_cek="SELECT * from tb_phylum where nama_phylum='$row[td]'";
          $hasil_cek = mysqli_query($con,$sql_cek);
          $row_coun=mysqli_num_rows($hasil_cek);
          // echo "[Phylum] Print Row td : ". $row['td'] ."<br>";
          // echo "[Phylum] Print SQL Cek : " .$sql_cek . "<br>";
          // echo "[Phylum] Jumlah ROW : ". $row_coun . "<br>";
            if ($row_coun==1) {
              while ($rowid = mysqli_fetch_array($hasil_cek))
              {
                $use_id_phylum = $rowid['id_phylum'];
                // echo "[Phylum] ID yang Diambil : ". $use_id_phylum. "<br>";
              }
            }
            else {
              $sql_input = "INSERT INTO tb_phylum (nama_phylum, id_kingdom) SELECT td, $use_id_kingdom FROM tmp WHERE tmp.`id`=$row[id];";
              $new_input = mysqli_query($con,$sql_input);
              $use_id_phylum = mysqli_insert_id($con);
              // echo "[Phylum] Print SQL New Input : ".$sql_input . "<br>";
              // echo "[Phylum] Last ID yang Diambil : ". $use_id_phylum. "<br>";
            }
            // $use_id_kingdom=1;
            $idsql="SELECT id_kingdom FROM tb_kingdom WHERE nama_kingdom='tidak diketahui';";
            $use_id_kingdom=mysqli_query($con,$idsql);
            $row_coun=mysqli_num_rows($use_id_kingdom);
            // echo "[Kingdom Default] Print Row td : ". $row['td'] ."<br>";
            // echo "[Kingdom Default] Print SQL Cek : " .$sql_cek . "<br>";
            // echo "[Kingdom Default] Jumlah ROW : ". $row_coun . "<br>";
              if ($row_coun==1) {
                while ($rowid = mysqli_fetch_array($use_id_kingdom))
                {
                  $use_id_kingdom = $rowid['id_phylum'];
                  // echo "[Kingdom Default] ID yang Diambil : ". $use_id_kingdom. "<br>";
                }
              }
              else {
                $sql_input = "INSERT INTO tb_kingdom (nama_kingdom) VALUES ('Tidak Diketahui');";
                $new_input = mysqli_query($con,$sql_input);
                $use_id_kingdom = mysqli_insert_id($con);
                // echo "[Kingdom Default] Print SQL New Input : ".$sql_input . "<br>";
                // echo "[Kingdom Default] Last ID yang Diambil : ". $use_id_kingdom. "<br>";
              }
            // echo "<br>";
          }

        elseif ($row['th']=="Class"){
          $sql_cek="SELECT * from tb_class where nama_class='$row[td]'";
          $hasil_cek = mysqli_query($con,$sql_cek);
          $row_coun=mysqli_num_rows($hasil_cek);
          // echo "[Class] Print Row td : ". $row['td'] ."<br>";
          // echo "[Class] Print SQL Cek : " .$sql_cek . "<br>";
          // echo "[Class] Jumlah ROW : ". $row_coun . "<br>";
            if ($row_coun==1) {
              while ($rowid = mysqli_fetch_array($hasil_cek))
              {
                $use_id_class = $rowid['id_class'];
                // echo "[Class] ID yang Diambil : ". $use_id_class. "<br>";
              }
            }
            else {
              $sql_input = "INSERT INTO tb_class (nama_class, id_phylum) SELECT td, $use_id_phylum FROM tmp WHERE tmp.`id`=$row[id];";
              $new_input = mysqli_query($con,$sql_input);
              $use_id_class = mysqli_insert_id($con);
              // echo "[Class] Print SQL New Input : ".$sql_input . "<br>";
              // echo "[Class] Last ID yang Diambil : ". $use_id_class. "<br>";
            }
            // $use_id_phylum=1;
            $idsql="SELECT id_phylum FROM tb_phylum WHERE nama_phylum='tidak diketahui';";
            $use_id_phylum=mysqli_query($con,$idsql);
            $row_coun=mysqli_num_rows($use_id_phylum);
            // echo "[Phylum Default] Print Row td : ". $row['td'] ."<br>";
            // echo "[Phylum Default] Print SQL Cek : " .$sql_cek . "<br>";
            // echo "[Phylum Default] Jumlah ROW : ". $row_coun . "<br>";
              if ($row_coun==1) {
                while ($rowid = mysqli_fetch_array($use_id_phylum))
                {
                  $use_id_phylum = $rowid['id_phylum'];
                  // echo "[Phylum Default] ID yang Diambil : ". $use_id_phylum. "<br>";
                }
              }
              else {
                $sql_input = "INSERT INTO tb_phylum (nama_phylum) VALUES ('Tidak Diketahui');";
                $new_input = mysqli_query($con,$sql_input);
                $use_id_phylum = mysqli_insert_id($con);
                // echo "[Phylum Default] Print SQL New Input : ".$sql_input . "<br>";
                // echo "[Phylum Default] Last ID yang Diambil : ". $use_id_phylum. "<br>";
              }
            // echo "<br>";
          }

        elseif ($row['th']=="Order"){
          $sql_cek="SELECT * from tb_ordo where nama_ordo='$row[td]'";
          $hasil_cek = mysqli_query($con,$sql_cek);
          $row_coun=mysqli_num_rows($hasil_cek);
          // echo "[Ordo] Print Row td : ". $row['td'] ."<br>";
          // echo "[Ordo] Print SQL Cek : " .$sql_cek . "<br>";
          // echo "[Ordo] Jumlah ROW : ". $row_coun . "<br>";
            if ($row_coun==1) {
              while ($rowid = mysqli_fetch_array($hasil_cek))
              {
                $use_id_ordo = $rowid['id_ordo'];
                // echo "[Ordo] ID yang Diambil : ". $use_id_ordo. "<br>";
              }
            }
            else {
              $sql_input = "INSERT INTO tb_ordo (nama_ordo, id_class) SELECT td, $use_id_class FROM tmp WHERE tmp.`id`=$row[id];";
              $new_input = mysqli_query($con,$sql_input);
              $use_id_ordo = mysqli_insert_id($con);
              // echo "[Ordo] Print SQL New Input : ".$sql_input . "<br>";
              // echo "[Ordo] Last ID yang Diambil : ". $use_id_ordo. "<br>";
            }
            // $use_id_class=1;
            $idsql="SELECT id_class FROM tb_class WHERE nama_class='tidak diketahui';";
            $use_id_class=mysqli_query($con,$idsql);
            $row_coun=mysqli_num_rows($use_id_class);
            // echo "[Class Default] Print Row td : ". $row['td'] ."<br>";
            // echo "[Class Default] Print SQL Cek : " .$sql_cek . "<br>";
            // echo "[Class Default] Jumlah ROW : ". $row_coun . "<br>";
              if ($row_coun==1) {
                while ($rowid = mysqli_fetch_array($use_id_class))
                {
                  $use_id_class = $rowid['id_class'];
                  // echo "[Class Default] ID yang Diambil : ". $use_id_class. "<br>";
                }
              }
              else {
                $sql_input = "INSERT INTO tb_class (nama_class) VALUES ('Tidak Diketahui');";
                $new_input = mysqli_query($con,$sql_input);
                $use_id_class = mysqli_insert_id($con);
                // echo "[Class Default] Print SQL New Input : ".$sql_input . "<br>";
                // echo "[Class Default] Last ID yang Diambil : ". $use_id_class. "<br>";
              }
            // echo "<br>";
          }

        elseif ($row['th']=="Family"){
          $sql_cek="SELECT * from tb_family where nama_family='$row[td]'";
          $hasil_cek = mysqli_query($con,$sql_cek);
          $row_coun=mysqli_num_rows($hasil_cek);
          // echo "[Family] Print Row td : ". $row['td'] ."<br>";
          // echo "[Family] Print SQL Cek : " .$sql_cek . "<br>";
          // echo "[Family] Jumlah ROW : ". $row_coun . "<br>";
            if ($row_coun==1) {
              while ($rowid = mysqli_fetch_array($hasil_cek))
              {
                $use_id_family = $rowid['id_family'];
                // echo "[Family] ID yang Diambil : ". $use_id_family. "<br>";
              }
            }
            else {
              $sql_input = "INSERT INTO tb_family (nama_family, id_ordo) SELECT td, $use_id_ordo FROM tmp WHERE tmp.`id`=$row[id];";
              $new_input = mysqli_query($con,$sql_input);
              $use_id_family = mysqli_insert_id($con);
              // echo "[Family] Print SQL New Input : ".$sql_input . "<br>";
              // echo "[Family] Last ID yang Diambil : ". $use_id_family. "<br>";
            }
            // $use_id_ordo=1;
            $idsql="SELECT id_ordo FROM tb_ordo WHERE nama_ordo='tidak diketahui';";
            $use_id_ordo=mysqli_query($con,$idsql);
            $row_coun=mysqli_num_rows($use_id_ordo);
            // echo "[Ordo Default] Print Row td : ". $row['td'] ."<br>";
            // echo "[Ordo Default] Print SQL Cek : " .$sql_cek . "<br>";
            // echo "[Ordo Default] Jumlah ROW : ". $row_coun . "<br>";
              if ($row_coun==1) {
                while ($rowid = mysqli_fetch_array($use_id_ordo))
                {
                  $use_id_ordo = $rowid['id_ordo'];
                  // echo "[Ordo Default] ID yang Diambil : ". $use_id_ordo. "<br>";
                }
              }
              else {
                $sql_input = "INSERT INTO tb_ordo (nama_ordo) VALUES ('Tidak Diketahui');";
                $new_input = mysqli_query($con,$sql_input);
                $use_id_ordo = mysqli_insert_id($con);
                // echo "[Ordo Default] Print SQL New Input : ".$sql_input . "<br>";
                // echo "[Ordo Default] Last ID yang Diambil : ". $use_id_ordo. "<br>";
              }
            // echo "<br>";
          }

        elseif ($row['th']=="Genus"){
          $sql_cek="SELECT * from tb_genus where nama_genus='$row[td]'";
          $hasil_cek = mysqli_query($con,$sql_cek);
          $row_coun=mysqli_num_rows($hasil_cek);
          // echo "[Genus] Print Row td : ". $row['td'] ."<br>";
          // echo "[Genus] Print SQL Cek : " .$sql_cek . "<br>";
          // echo "[Genus] Jumlah ROW : ". $row_coun . "<br>";
            if ($row_coun==1) {
              while ($rowid = mysqli_fetch_array($hasil_cek))
              {
                $use_id_genus = $rowid['id_genus'];
                // echo "[Genus] ID yang Diambil : ". $use_id_genus. "<br>";
              }
            }
            else {
              $sql_input = "INSERT INTO tb_genus (nama_genus, id_family) SELECT td, $use_id_family FROM tmp WHERE tmp.`id`=$row[id];";
              $new_input = mysqli_query($con,$sql_input);
              $use_id_genus = mysqli_insert_id($con);
              // echo "[Genus] Print SQL New Input : ".$sql_input . "<br>";
              // echo "[Genus] Last ID yang Diambil : ". $use_id_genus. "<br>";
            }
            // $use_id_family=1;
            $idsql="SELECT id_family FROM tb_family WHERE nama_family='tidak diketahui';";
            $use_id_family=mysqli_query($con,$idsql);
            $row_coun=mysqli_num_rows($use_id_family);
            // echo "[Family Default] Print Row td : ". $row['td'] ."<br>";
            // echo "[Family Default] Print SQL Cek : " .$sql_cek . "<br>";
            // echo "[Family Default] Jumlah ROW : ". $row_coun . "<br>";
              if ($row_coun==1) {
                while ($rowid = mysqli_fetch_array($use_id_family))
                {
                  $use_id_family = $rowid['id_family'];
                  // echo "[Family Default] ID yang Diambil : ". $use_id_family. "<br>";
                }
              }
              else {
                $sql_input = "INSERT INTO tb_family (nama_family) VALUES ('Tidak Diketahui');";
                $new_input = mysqli_query($con,$sql_input);
                $use_id_family = mysqli_insert_id($con);
                // echo "[Family Default] Print SQL New Input : ".$sql_input . "<br>";
                // echo "[Family Default] Last ID yang Diambil : ". $use_id_family. "<br>";
              }
            // echo "<br>";
          }

        elseif ($row['th']=="Scientific Name" || $row['th']=="Species"){
          $sql_cek="SELECT * from tb_species where nama_species='$row[td]'";
          $hasil_cek = mysqli_query($con,$sql_cek);
          $row_coun=mysqli_num_rows($hasil_cek);
          // echo "[Species] Print Row td : ". $row['td'] ."<br>";
          // echo "[Species] Print SQL Cek : " .$sql_cek . "<br>";
          // echo "[Species] Jumlah ROW : ". $row_coun . "<br>";
            if ($row_coun==1) {
              while ($rowid = mysqli_fetch_array($hasil_cek))
              {
                $use_id_species = $rowid['id_species'];
                // echo "[Species] ID yang Diambil : ". $use_id_species. "<br>";
              }
            }
            else {
              $sql_input = "INSERT INTO tb_species (nama_species, id_genus) SELECT td, $use_id_genus FROM tmp WHERE tmp.`id`=$row[id];";
              $new_input = mysqli_query($con,$sql_input);
              $use_id_species = mysqli_insert_id($con);
              // echo "[Species] Print SQL New Input : ".$sql_input . "<br>";
              // echo "[Species] Last ID yang Diambil : ". $use_id_species. "<br>";
            }
            // $use_id_genus=1;
            $idsql="SELECT id_genus FROM tb_genus WHERE nama_genus='tidak diketahui';";
            $use_id_genus=mysqli_query($con,$idsql);
            $row_coun=mysqli_num_rows($use_id_genus);
            // echo "[Genus Default] Print Row td : ". $row['td'] ."<br>";
            // echo "[Genus Default] Print SQL Cek : " .$sql_cek . "<br>";
            // echo "[Genus Default] Jumlah ROW : ". $row_coun . "<br>";
              if ($row_coun==1) {
                while ($rowid = mysqli_fetch_array($use_id_genus))
                {
                  $use_id_genus = $rowid['id_genus'];
                  // echo "[Genus Default] ID yang Diambil : ". $use_id_genus. "<br>";
                }
              }
              else {
                $sql_input = "INSERT INTO tb_genus (nama_genus) VALUES ('Tidak Diketahui');";
                $new_input = mysqli_query($con,$sql_input);
                $use_id_genus = mysqli_insert_id($con);
                // echo "[Genus Default] Print SQL New Input : ".$sql_input . "<br>";
                // echo "[Genus Default] Last ID yang Diambil : ". $use_id_genus. "<br>";
              }
            $des=0;
            $imgcount=0;
            echo "<br>";
          }

          elseif ($row['th']=="Group" || $row['th']=="Habitat" || $row['th']=="Diet" || $row['th']=="Prey" || $row['th']=="Predators" || $row['th']=="Lifestyle" || $row['th']=="Life Span"){
            $sql_cek="SELECT * from tb_ciri where ciri='$row[th]'";
            $hasil_cek = mysqli_query($con,$sql_cek);
            $row_coun=mysqli_num_rows($hasil_cek);
            // echo "[Ciri] Print Row td : ". $row['td'] ."<br>";
            // echo "[Ciri] Print SQL Cek : " .$sql_cek . "<br>";
            // echo "[Ciri] Jumlah ROW : ". $row_coun . "<br>";
              if ($row_coun==1) {
                while ($rowid = mysqli_fetch_array($hasil_cek))
                {
                  $use_id_ciri = $rowid['id_ciri'];
                  // echo "[Ciri] ID yang Diambil : ". $use_id_ciri. "<br>";
                }
              }
              else {
                $sql_input = "INSERT INTO tb_ciri (ciri) SELECT th FROM tmp WHERE tmp.`id`=$row[id];";
                $new_input = mysqli_query($con,$sql_input);
                $use_id_ciri = mysqli_insert_id($con);
                // echo "[Ciri] Print SQL New Input : ".$sql_input . "<br>";
                // echo "[Ciri] Last ID yang Diambil : ". $use_id_ciri. "<br>";
              }
              $sql_cek="SELECT * from tb_ciri_species where id_species=$use_id_species and keterangan_cspecies='$row[td]'";
              $hasil_cek = mysqli_query($con,$sql_cek);
              $row_coun=mysqli_num_rows($hasil_cek);
              // echo "[Ciri Species] Print Row td : ". $row['td'] ."<br>";
              // echo "[Ciri Species] Print SQL Cek : " .$sql_cek . "<br>";
              // echo "[Ciri Species] Jumlah ROW : ". $row_coun . "<br>";
              if($row_coun==0){
                $sql_input = "INSERT INTO tb_ciri_species (keterangan_cspecies, id_species, id_ciri) SELECT td, $use_id_species, $use_id_ciri FROM tmp WHERE tmp.`id`=$row[id];";
                $new_input = mysqli_query($con,$sql_input);
                $use_id_ciri = mysqli_insert_id($con);
                // echo "[Ciri Species] Print SQL New Input : ".$sql_input . "<br>";
                // echo "[Ciri Species] Last ID yang Diambil : ". $use_id_ciri. "<br>";
              }
              // $use_id_ciri=1;
              $idsql="SELECT id_ciri FROM tb_ciri WHERE ciri='tidak diketahui';";
              $use_id_ciri=mysqli_query($con,$idsql);
              $row_coun=mysqli_num_rows($use_id_ciri);
              // echo "[Ciri Default] Print Row td : ". $row['td'] ."<br>";
              // echo "[Ciri Default] Print SQL Cek : " .$sql_cek . "<br>";
              // echo "[Ciri Default] Jumlah ROW : ". $row_coun . "<br>";
                if ($row_coun==1) {
                  while ($rowid = mysqli_fetch_array($use_id_ciri))
                  {
                    $use_id_ciri = $rowid['id_ciri'];
                    // echo "[Ciri Default] ID yang Diambil : ". $use_id_ciri. "<br>";
                  }
                }
                else {
                  $sql_input = "INSERT INTO tb_ciri (ciri) VALUES ('Tidak Diketahui');";
                  $new_input = mysqli_query($con,$sql_input);
                  $use_id_ciri = mysqli_insert_id($con);
                  // echo "[Ciri Default] Print SQL New Input : ".$sql_input . "<br>";
                  // echo "[Ciri Default] Last ID yang Diambil : ". $use_id_ciri. "<br>";
                }
              // echo "<br>";
            }

          elseif ($row['th']=="Deskripsi"){
            $sql_cek="SELECT * from tb_species where id_species=$use_id_species and deskripsi_species='$row[td]'";
            $hasil_cek = mysqli_query($con,$sql_cek);
            $row_coun=mysqli_num_rows($hasil_cek);
            // echo "[Deskripsi Species] Print Row td : ". $row['td'] ."<br>";
            // echo "[Deskripsi Species] Print SQL Cek : " .$sql_cek . "<br>";
            // echo "[Deskripsi Species] Jumlah ROW : ". $row_coun . "<br>";
              if ($row_coun==0) {
                if ($des==0) {
                  $sql_input = "UPDATE tb_species SET deskripsi_species = (SELECT td FROM tmp WHERE tmp.`id`=$row[id]) WHERE id_species=$use_id_species;";
                  $new_input = mysqli_query($con,$sql_input);
                  // echo "[Deskripsi Species] Print SQL New Input : ".$sql_input . "<br>";
                  $des++;
                }
              }
              // echo "<br>";
            }

          elseif ($row['th']=="Distribution"){
            $sql_cek="SELECT * from tb_wilayah where nama_wilayah='$row[td]'";
            $hasil_cek = mysqli_query($con,$sql_cek);
            $row_coun=mysqli_num_rows($hasil_cek);
            // echo "[Wilayah] Print Row td : ". $row['td'] ."<br>";
            // echo "[Wilayah] Print SQL Cek : " .$sql_cek . "<br>";
            // echo "[Wilayah] Jumlah ROW : ". $row_coun . "<br>";
              if ($row_coun==1) {
                while ($rowid = mysqli_fetch_array($hasil_cek))
                {
                  $use_id_wilayah = $rowid['id_wilayah'];
                  // echo "[Wilayah] ID yang Diambil : ". $use_id_wilayah. "<br>";
                }
              }
              else {
                $sql_input = "INSERT INTO tb_wilayah (nama_wilayah) SELECT td FROM tmp WHERE tmp.`id`=$row[id];";
                $new_input = mysqli_query($con,$sql_input);
                $use_id_wilayah = mysqli_insert_id($con);
                // echo "[Wilayah] Print SQL New Input : ".$sql_input . "<br>";
                // echo "[Wilayah] Last ID yang Diambil : ". $use_id_wilayah. "<br>";
              }
              $sql_cek="SELECT * from tb_species_wilayah where id_species=$use_id_species and id_wilayah='$use_id_wilayah'";
              $hasil_cek = mysqli_query($con,$sql_cek);
              $row_coun=mysqli_num_rows($hasil_cek);
              // echo "[Wilayah Species] Print Row td : ". $row['td'] ."<br>";
              // echo "[Wilayah Species] Print SQL Cek : " .$sql_cek . "<br>";
              // echo "[Wilayah Species] Jumlah ROW : ". $row_coun . "<br>";
              if($row_coun==0){
                $sql_input = "INSERT INTO tb_species_wilayah (id_species, id_wilayah) VALUES ($use_id_species, $use_id_wilayah)";
                $new_input = mysqli_query($con,$sql_input);
                $use_id_ciri = mysqli_insert_id($con);
                // echo "[Wilayah Species] Print SQL New Input : ".$sql_input . "<br>";
                // echo "[Wilayah Species] Last ID yang Diambil : ". $use_id_ciri. "<br>";
              }
              // $use_id_ciri=1;
              // echo "<br>";
            }

          elseif ($row['th']=="Image"){
            $sql_cek="SELECT * from tb_gambar_species where id_species=$use_id_species and gambar_species='$row[td]'";
            $hasil_cek = mysqli_query($con,$sql_cek);
            $row_coun=mysqli_num_rows($hasil_cek);
            // echo "[Image Species] Print Row td : ". $row['td'] ."<br>";
            // echo "[Image Species] Print SQL Cek : " .$sql_cek . "<br>";
            // echo "[Image Species] Jumlah ROW : ". $row_coun . "<br>";
              if ($row_coun==0) {
                if ($imgcount==0) {
                  $sql_input = "INSERT INTO tb_gambar_species (id_species, gambar_species) SELECT $use_id_species, td FROM tmp WHERE tmp.`id`=$row[id];";
                  $new_input = mysqli_query($con,$sql_input);
                  // echo "[Image Species] Print SQL New Input : ".$sql_input . "<br>";
                  $imgcount++;
                }
              }
              // $use_id_species=1;
              $idsql="SELECT id_species FROM tb_species WHERE nama_species='tidak diketahui';";
              $use_id_species=mysqli_query($con,$idsql);
              $row_coun=mysqli_num_rows($use_id_species);
              // echo "[Species Default] Print Row td : ". $row['td'] ."<br>";
              // echo "[Species Default] Print SQL Cek : " .$sql_cek . "<br>";
              // echo "[Species Default] Jumlah ROW : ". $row_coun . "<br>";
                if ($row_coun==1) {
                  while ($rowid = mysqli_fetch_array($use_id_species))
                  {
                    $use_id_species = $rowid['id_species'];
                    // echo "[Species Default] ID yang Diambil : ". $use_id_species. "<br>";
                  }
                }
                else {
                  $sql_input = "INSERT INTO tb_species (nama_species) VALUES ('Tidak Diketahui');";
                  $new_input = mysqli_query($con,$sql_input);
                  $use_id_species = mysqli_insert_id($con);
                  // echo "[Species Default] Print SQL New Input : ".$sql_input . "<br>";
                  // echo "[Species Default] Last ID yang Diambil : ". $use_id_species. "<br>";
                }
            // echo "<br>";
            }

        // else{
        //     $sql_input = "GAGAL DIINPUT";
        //     echo "[ERROR] ERROR ID : ". $row['id'] . " = " . $sql_input . "<br>";
        //     echo "<br>";
        //   }

      // echo $row['id'] . " = " . $sql . "<br>";
      // mysqli_query($con,$sql);
      // $last_id = mysqli_insert_id($con);
      $truncate = "TRUNCATE TABLE tmp;";
      mysqli_query($con,$truncate);
    }
      // echo "Selesai";
      // $time_elapsed_secs = microtime(true) - $start;
      // $duration = $time_elapsed_secs;
      // $hours = (int)($duration/60/60);
      // $minutes = (int)($duration/60)-$hours*60;
      // $seconds = $duration-$hours*60*60-$minutes*60;
      // $sec = number_format((float)$seconds, 2, '.', '');
      // // echo "Total execution time in seconds : " . $time_elapsed_secs;
      // $message = 'Proses Selesai dengan waktu ' . $sec . ' detik';
      //     echo "<SCRIPT type='text/javascript'> //not showing me this
      //         alert('$message');
      //         window.location.replace(\"../../index.php\");
      //     </SCRIPT>";
    ?>
  </body>
</html>
