<?php
// KONFIGURASI DATABASE
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="classify";

$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if (mysqli_connect_errno()) {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// else {
//    echo "Connection Successful \n";
//    echo '<br>';
// }
?>
