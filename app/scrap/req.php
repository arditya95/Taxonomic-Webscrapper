<?php
// header('Content-Type: application/json');

include_once "../../setting/koneksi.php";
include_once "../../setting/simple_html_dom.php";
$url='http://www.catalogueoflife.org/col/browse/tree/fetch/taxa?id=35509576&start=0';
$html = file_get_contents($url);
// echo $html;
$data = json_decode($html,true);
// var_dump ($data);
echo $data['items'][0]['id'];
?>
