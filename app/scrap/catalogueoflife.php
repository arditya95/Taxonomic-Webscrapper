<?php
set_time_limit(0);
error_reporting(0);
$start = microtime(true);

include_once "../../setting/koneksi.php";
include_once "../../setting/simple_html_dom.php";

$url = "http://www.catalogueoflife.org/col/details/species/id/266945f29c8fa5e81b26d781b902394c/source/tree";

$html = file_get_html($url);

foreach($html->find('table[id=taxonomic-classification] td') as $e)
{
   $hasil = $e->plaintext;
   $trim=trim($hasil);
   if (!strcmp($trim,"CoL") || !strcmp($trim,"ELPT") || strpos($trim,"LSID") !== false) {
    //  var_dump($trim);
    //  echo "<br>";
    // TODO: KINGDOM - GENUS
   }
   else {
     var_dump($trim);
     echo "<br>";
   }
}

foreach($html->find('h1.page_header i') as $e)
{
  $hasil = $e->plaintext;
  $trim=trim($hasil);
  var_dump($trim);
  echo "<br>";
  // TODO: SPECIES
}
?>
