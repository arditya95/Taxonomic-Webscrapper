<?php
include("simple_html_dom.php");
$html = file_get_html("https://www.tokopedia.com/p/handphone-tablet/smartwatch");
$html->save('result.htm');
$count=1;
foreach($html->find('div[class=catalog__main__content] a') as $e)
  {
    $count = $count+1;
    $hasil =$e->href;
    echo $hasil . "<br>";
    // var_dump($hasil);
    // print_r($hasil);
  }
echo "FINISH";

?>
