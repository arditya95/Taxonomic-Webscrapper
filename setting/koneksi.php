<?php
// [SERVER] KONFIGURASI DATABASE
$db_host="mysql.idhostinger.com";
$db_user="u294221690_class";
$db_pass="classify";
$db_name="u294221690_class";

// [LOCAL] KONFIGURASI DATABASE
// $db_host="localhost";
// $db_user="root";
// $db_pass="";
// $db_name="classify";

$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if (mysqli_connect_errno()) {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// else {
//    echo "Connection Successful \n";
//    echo '<br>';
// }
?>
