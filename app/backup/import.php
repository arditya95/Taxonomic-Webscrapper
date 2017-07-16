<?php
  include_once "../../setting/koneksi.php";
  $filename=$_GET['loc'];
  $DB_HOST="localhost";
  $DB_USER="root";
  $DB_PASS="";
  $DB_NAME="coba";

  $command = "mysql -h{$DB_HOST} -u{$DB_USER} {$DB_NAME} < $filename";
  system($command, $output);
  if($output != 0) {
    echo 'Error during restore '. $output;
  }
  else {
    $sql="INSERT INTO import_detail (file_path, import_date) VALUES ('$filename', NOW());";
    mysqli_query($con,$sql);
    // mysql_close($con);
    $message = 'Database Restored';
        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
            window.location.replace(\"../../index.php\");
        </SCRIPT>";
  }
?>
