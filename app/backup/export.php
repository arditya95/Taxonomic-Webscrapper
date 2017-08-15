<?php
  include_once "../../setting/koneksi.php";
  $DB_HOST="localhost";
  $DB_USER="root";
  $DB_PASS="";
  $DB_NAME="classify";
  date_default_timezone_set("Australia/Perth");
  $date=date("Y-m-d-H-i-s");

  $filename = "dump/" . "backup-$DB_NAME-" . $date . ".sql";

  $command = "mysqldump --routines -h{$DB_HOST} -u{$DB_USER} {$DB_NAME} > $filename";
  system($command, $output);

  if($output != 0) {
    echo 'Error during backup '. $output;
  }
  else {
    $sql="INSERT INTO export_detail (file_path, export_date) VALUES ('$filename', NOW());";
    mysqli_query($con,$sql);
    // mysql_close($con);
    $message = 'Database Saved';
        echo "<SCRIPT type='text/javascript'> //not showing me this
            alert('$message');
            window.location.replace(\"../../index.php\");
        </SCRIPT>";
  }
?>
