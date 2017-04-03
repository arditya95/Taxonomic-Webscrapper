<!-- kode program untuk melakukan input
terhadap seluruh data link dari hewan yang ada -->

<?php
set_time_limit(0);
$start = microtime(true);

include("simple_html_dom.php");
Include "koneksi.php";

$html = file_get_html("http://a-z-animals.com/animals/");

$count=0;
foreach($html->find('div[class=az-left-box az-animals-index] a') as $e)
    {
    $hasil = "http://a-z-animals.com" . $e->href;
    $count = $count+1;
    echo $count. " http://a-z-animals.com" . $e->href . '<br>';
    $query = "INSERT INTO tb_link (info) VALUES ('$hasil')";
    mysqli_query($con,$query);
    //var_dump($hasil);
    }
    echo "FINISH" ."<br>";
    $time_elapsed_secs = microtime(true) - $start;
    echo "Total execution time in seconds : " . $time_elapsed_secs;
?>
