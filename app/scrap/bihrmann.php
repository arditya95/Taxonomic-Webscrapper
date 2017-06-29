<?php
set_time_limit(0);
error_reporting(0);
$start = microtime(true);

include_once "../../setting/koneksi.php";
include_once "../../setting/simple_html_dom.php";

$url = "http://www.bihrmann.com/caudiciforms/";

$html = file_get_html($url);

foreach($html->find('table["id=table2"] a') as $e)
 {
   $hasil = $e->href;
   echo $hasil."<br>";
  //$query = "INSERT INTO tmp (th) VALUES ('$hasil')";
  //mysqli_query($con,$query);
  //$last_id = mysqli_insert_id($con);
  //$updatecount=0;
}
?>
