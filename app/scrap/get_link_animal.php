<!-- kode program untuk melakukan input
terhadap seluruh data link dari hewan yang ada -->

<?php
error_reporting(0);
set_time_limit(0);
$start = microtime(true);

include_once "../../setting/koneksi.php";
include_once "../../setting/simple_html_dom.php";

// TODO: mengambil berapa banyak link yang akan di proses
// if (isset($_POST['submit'])) {
//   $qty = $_POST['quantity'];
//   if (empty($qty)) {
//     $qty=1;
//   }
//   $sql="SELECT * FROM tb_link WHERE label=0 LIMIT $qty";
//   mysqli_query($con,$sql);
// }

$html = file_get_html("http://a-z-animals.com/animals/");

$count=0;
foreach($html->find('div[class=az-left-box az-animals-index] a') as $e)
    {
    $hasil = "http://a-z-animals.com" . $e->href;
    $count = $count+1;
    // echo $count. " http://a-z-animals.com" . $e->href . '<br>';
    $query = "INSERT INTO tb_link (info) VALUES ('$hasil')";
    mysqli_query($con,$query);
    //var_dump($hasil);
    }
    // echo "FINISH" ."<br>";
    $time_elapsed_secs = microtime(true) - $start;
    $duration = $time_elapsed_secs;
    // $hours = (int)($duration/60/60);
    // $minutes = (int)($duration/60)-$hours*60;
    // $seconds = $duration-$hours*60*60-$minutes*60;
    // $sec = number_format((float)$seconds, 2, '.', '');
    // echo "Total execution time in seconds : " . $time_elapsed_secs;
    $message = 'Proses Selesai dengan waktu ' . $duration . ' detik & ' . $count .' Data yang berhasil disimpan';
        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
            window.location.replace(\"../../index.php\");
        </SCRIPT>";
?>
