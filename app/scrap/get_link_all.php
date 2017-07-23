<?php
include_once "../../setting/koneksi.php";

if (isset($_POST['submit'])) {
  $web = $_POST['website'];
  $sql="SELECT * FROM tb_referensi WHERE id_referensi=$web";
  $hasil=mysqli_query($con,$sql);
  while($row=mysqli_fetch_array($hasil))
    {
        $url=$row['link'];
        $host= parse_url($url, PHP_URL_HOST);
        if(!strcmp($host,'a-z-animals.com')) {
          include 'get_link_animal.php';
          // exec('php -q get_link_animal.php');
          // echo "$host";
        }
        else {
          include 'get_link_col.php';
          // exec('php -q get_link_col.php');
          // echo "$host";
        }
    }

}


 ?>
