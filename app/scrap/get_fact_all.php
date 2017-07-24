<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <!-- <body> -->
    <div id="wrapper">
    <?php
      set_time_limit(0);
      error_reporting(0);
      $start = microtime(true);
      $count =0;

      include_once "../../setting/koneksi.php";
      include_once "../../setting/simple_html_dom.php";

      // TODO: mengambil berapa banyak link yang akan di proses
      if (isset($_POST['submit'])) {
        $qty = $_POST['quantity'];
        if (empty($qty)) {
          $qty=1;
        }
        $sql="SELECT * FROM tb_link WHERE label=0 LIMIT $qty";
        // mysqli_query($con,$sql);
      }

      // $pilih = "SELECT * FROM tb_link WHERE label=0";
      // $sql = mysqli_query($con,$pilih);
      // $count=0;
      $get_link = mysqli_query($con,$sql);
      while ($row = mysqli_fetch_array($get_link))
       {
        //  $count++;
        //  echo "$count <br>";
        //  exec('php -q filter.php');
         $url=$row['info'];
         $host= parse_url($url, PHP_URL_HOST);

          // TODO: GET FACT a-z-animals.com
          if (!strcmp($host,"a-z-animals.com")) {
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
                    //  var_dump($piece);
                    //  echo "<br>";
                 }
             }
             //AKHIR BAGIAN MENGANBIL FAKTA//
             //AWAL BAGIAN MENGANBIL DESKRIPSI//
             foreach($html->find('div[id=jump-article]') as $e)
               {
                $inputhasil = $e->plaintext;
                $inputquery = "INSERT INTO tmp (th,td) VALUES ('Deskripsi','$inputhasil')";
                mysqli_query($con,$inputquery);
                //var_dump($inputhasil);
               }
             //AKHIR BAGIAN MENGANBIL DESKRIPSI//
             //AWAL BAGIAN MENGANBIL GAMBAR//
             foreach($html->find('div[class=content] img') as $e){
               $hasilimg = "http://a-z-animals.com" . $e->src;
               $ext = pathinfo($hasilimg, PATHINFO_EXTENSION);
               if ($ext=="jpg") {
                 // echo $hasilimg ."<br>";
                 // echo $ext ."<br>";
                 $querya = "INSERT INTO tmp (th,td) VALUES ('Image','$hasilimg')";
                 mysqli_query($con,$querya);
                }
              }
          }

          // TODO: GET FACT www.catalogueoflife.org
          else {
            $html = file_get_html($row['info']);
            $updatecount=0;
            foreach($html->find('table[id=taxonomic-classification] td') as $e)
            {
               $hasil = $e->plaintext;
               $trim=trim($hasil);
               if (!strcmp($trim,"CoL") || !strcmp($trim,"ELPT") || !strcmp($trim,"WoRMS Polychaeta") || strpos($trim,"LSID") !== false) {
                //  var_dump($trim);
                //  echo "<br>";
                // TODO: KINGDOM - GENUS
               }
               else {
                //  var_dump($trim);
                //  echo "<br>";
                 if ($updatecount==0) {
                   $querya = "INSERT INTO tmp (th) VALUES ('$trim')";
                   mysqli_query($con,$querya);
                   $last_id = mysqli_insert_id($con);
                   $updatecount++;
                 }

                 elseif($updatecount==1)
                 {
                   $queryb = "UPDATE tmp SET td='$trim' WHERE id=$last_id";
                   mysqli_query($con,$queryb);
                   $updatecount=0;
                 }
               }
            }

            foreach($html->find('h1.page_header i') as $e)
            {
              $hasil = $e->plaintext;
              $trim=trim($hasil);
              $species="Species";
              $querya = "INSERT INTO tmp (th) VALUES ('$species')";
              mysqli_query($con,$querya);
              $last_id = mysqli_insert_id($con);
              // var_dump($species);
              // echo "<br>";

              $queryb = "UPDATE tmp SET td='$trim' WHERE id=$last_id";
              mysqli_query($con,$queryb);
              // var_dump($trim);
              // echo "<br>";
              // TODO: SPECIES
            }

            foreach($html->find('tr.even td',4) as $e)
            {
              $hasil = $e->plaintext;
              $trim=trim($hasil);
              if (!empty($trim)) {
                $preg_trim=preg_replace('/[:]/', ',', $trim);
                $pieces = explode(",", $preg_trim);

                foreach ($pieces as $piece) {
                  if (!empty($piece)) {
                    $preg=preg_replace('/[:,]/', '', $piece);
                    $preg2=trim($preg);
                    if (strcmp($preg2,"Distribution")) {
                      $distribution="Distribution";
                      $querya = "INSERT INTO tmp (th) VALUES ('$distribution')";
                      mysqli_query($con,$querya);
                      $last_id = mysqli_insert_id($con);

                      $queryb = "UPDATE tmp SET td='$preg2' WHERE id=$last_id";
                      mysqli_query($con,$queryb);
                      // echo "[" . $preg2 ."] <br> ";
                    }
                  }
                }
                // var_dump($pieces);
                // echo "<br>";
              }
              // TODO: WILAYAH
            }
          }

           //AKHIR BAGIAN MENGANBIL GAMBAR//
           // TODO: update tb_link jika sudah diambil data
           $query = "UPDATE tb_link SET label=1 WHERE id=$row[id]";
           mysqli_query($con,$query);
           exec('php -q filter.php');
        }
        $time_elapsed_secs = microtime(true) - $start;
        $duration = $time_elapsed_secs;
        // $hours = (int)($duration/60/60);
        // $minutes = (int)($duration/60)-$hours*60;
        // $seconds = $duration-$hours*60*60-$minutes*60;
        // $sec = number_format((float)$seconds, 2, '.', '');
        // $sec= date('i:s.u', $duration);
        // echo "Total execution time in seconds : " . $time_elapsed_secs;
        $message = 'Proses Selesai dengan waktu ' . $duration . ' detik';
            echo "<SCRIPT type='text/javascript'> //not showing me this
                alert('$message');
                window.location.replace(\"../../index.php\");
            </SCRIPT>";
    ?>
    </div>
  </body>
</html>
