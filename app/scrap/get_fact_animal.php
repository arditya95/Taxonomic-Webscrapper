<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>
    <div id="wrapper">
    <?php
      set_time_limit(0);
      // error_reporting(0);
      $start = microtime(true);

      include_once "../../setting/koneksi.php";
      include_once "../../setting/simple_html_dom.php";

      // TODO: mengambil berapa banyak link yang akan di proses
      // if (isset($_POST['submit'])) {
      //   $qty = $_POST['quantity'];
      //   if (empty($qty)) {
      //     $qty=1;
      //   }
      //   $sql="SELECT * FROM tb_link WHERE label=0 LIMIT $qty";
      //   mysqli_query($con,$sql);
      // }

      $sql = "SELECT * FROM tb_link WHERE id=17";
      $count=0;
      $hasil = mysqli_query($con,$sql);
      while ($row = mysqli_fetch_array($hasil))
       {
         $html = file_get_html($row['info']);
         //AWAL BAGIAN MENGANBIL FAKTA//
         foreach($html->find('table.az-facts td') as $e)
          {
            $inputhasil = $e->plaintext;
            $trim=trim($inputhasil);
              $pieces = array_slice(explode(':', $trim), 0, 1);
              foreach ($pieces as $piece) {
                  if ($count==0) {
                    if (!empty($piece)) {
                      $query = "INSERT INTO tmp (th) VALUES ('$piece')";
                      mysqli_query($con,$query);
                      $last_id = mysqli_insert_id($con);
                      $count++;
                    }else {
                      $piece="INI SPACE";
                    }
                  }else {
                    if (empty($piece)) {
                      $piece="Data Kosong";
                      $query = "UPDATE tmp SET td='$piece' WHERE id=$last_id";
                      mysqli_query($con,$query);
                      $count=0;
                    }else {
                      $query = "UPDATE tmp SET td='$piece' WHERE id=$last_id";
                      mysqli_query($con,$query);
                      $count=0;
                    }
                  }
                  // echo "[" . $piece ."] <br> ";
                  var_dump($piece);
                  echo "<br>";
              }
          }
          //AKHIR BAGIAN MENGANBIL FAKTA//

          //AWAL BAGIAN MENGANBIL DESKRIPSI//
          // foreach($html->find('div[id=jump-article]') as $e)
          //   {
          //    $inputhasil = $e->plaintext;
          //    var_dump($inputhasil);
          //    echo "<br>";
          //    $inputquery = "INSERT INTO tmp (th,td) VALUES ('Deskripsi','$inputhasil')";
          //    mysqli_query($con,$inputquery);
          //    //var_dump($inputhasil);
          //   }
          // //AKHIR BAGIAN MENGANBIL DESKRIPSI//
          // //AWAL BAGIAN MENGANBIL GAMBAR//
          // foreach($html->find('div[class=content] img') as $e){
          //   $hasilimg = "http://a-z-animals.com" . $e->src;
          //   $ext = pathinfo($hasilimg, PATHINFO_EXTENSION);
          //   if ($ext=="jpg") {
          //     // echo $hasilimg ."<br>";
          //     // echo $ext ."<br>";
          //     $querya = "INSERT INTO tmp (th,td) VALUES ('Image','$hasilimg')";
          //     mysqli_query($con,$querya);
          //    }
          //  }
          //  //AKHIR BAGIAN MENGANBIL GAMBAR//
          //  $query = "UPDATE tb_link SET label=1 WHERE id=$row[id]";
          //  mysqli_query($con,$query);
        }
        // $time_elapsed_secs = microtime(true) - $start;
        // $duration = $time_elapsed_secs;
        // $hours = (int)($duration/60/60);
        // $minutes = (int)($duration/60)-$hours*60;
        // $seconds = $duration-$hours*60*60-$minutes*60;
        // $sec = number_format((float)$seconds, 2, '.', '');
        // echo "Total execution time in seconds : " . $time_elapsed_secs;
        // $message = 'Proses Selesai dengan waktu ' . $sec . ' detik';
        //     echo "<SCRIPT type='text/javascript'> //not showing me this
        //         alert('$message');
        //         window.location.replace(\"../../index.php\");
        //     </SCRIPT>";
    ?>
    </div>
  </body>
</html>
