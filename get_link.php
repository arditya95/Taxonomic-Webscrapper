<!-- kode program untuk melakukan input
terhadap seluruh data link dari hewan yang ada -->

<?php
set_time_limit(0);
// Include the library
include("simple_html_dom.php");
Include "koneksi.php";
// Retrieve the DOM from a given URL
$html = file_get_html("http://a-z-animals.com/animals/");

// Find all "A" tags and print their HREFs
foreach($html->find('div[class=az-left-box az-animals-index] a') as $e)
    {
    $count = $count+1;
    // echo $count. "http://a-z-animals.com" . $e->href . '<br>';
    $hasil = "http://a-z-animals.com" . $e->href;
    // $query = "INSERT INTO tb_test (info) VALUES ('$hasil')";
    // mysqli_query($con,$query);
    var_dump($hasil);
    }
    echo "FINISH";
?>
