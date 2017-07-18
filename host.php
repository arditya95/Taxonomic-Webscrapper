<?php
// $url="http://a-z-animals.com/animals/pictures/A/";
$url="http://www.catalogueoflife.org/col/details/species/id/266945f29c8fa5e81b26d781b902394c/source/tree";
// $link_id = $row_link['id_link'];
//  echo $row_link['link'] . "<br>";
$host= parse_url($url, PHP_URL_HOST);
 // echo $host . "<br>";

 if (!strcmp($host,"a-z-animals.com")) {
   echo "a-z-animals.com";
 }else {
   echo "www.catalogueoflife.org";
 }
 ?>
