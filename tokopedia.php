<?php
include("simple_html_dom.php");
$html = file_get_html("https://www.tokopedia.com/vgenmart/mi-band-2-layar-oled-original-termurah");
$html->save('result.htm');
$count=1;
foreach($html->find('div[class=product-box-content] text') as $e)
  {
    $count = $count+1;
    $hasil =$e->innertext;
    echo $hasil . "<br>";
    // var_dump($hasil);
    // print_r($hasil);
  }
echo "FINISH";

?>