<?php
set_time_limit(0);
error_reporting(0);
$start = microtime(true);

include_once "../../setting/koneksi.php";
include_once "../../setting/simple_html_dom.php";

// TODO: mengambil berapa banyak link yang akan di proses
// if (isset($_POST['submit'])) {
  // $qty = $_POST['quantity'];
  // if (empty($qty)) {
    $qty=1;
  // }
  $sql="SELECT * FROM tb_link WHERE label=0 LIMIT $qty";
  mysqli_query($con,$sql);
// }
$count=0;

// $url = "http://www.catalogueoflife.org/col/details/species/id/370133a77736f5527211a7c17e9ed0aa/source/tree";
// $url = "http://www.catalogueoflife.org/col/details/species/id/5d9e98b4a069ece2328c38294fa2333b/source/tree";
$get_link = mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($get_link)){
  // $count++;
  // echo "$count <br>";
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
       var_dump($trim);
       echo "<br>";
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
    var_dump($species);
    echo "<br>";

    $queryb = "UPDATE tmp SET td='$trim' WHERE id=$last_id";
    mysqli_query($con,$queryb);
    var_dump($trim);
    echo "<br>";
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
            echo "[" . $preg2 ."] <br> ";
          }
        }
      }
      var_dump($pieces);
      echo "<br>";
    }
    // TODO: WILAYAH
  }
}// TODO: end loop
// mysql_close($con);
?>
