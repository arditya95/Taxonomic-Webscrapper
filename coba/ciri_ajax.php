<?php
 // $connect = mysqli_connect("localhost", "root", "", "test_db");
$number1 = count($_POST["name"]);
$number2 = count($_POST["select"]);
 if($number1 > 0)
 {
      for($i=0; $i<$number1; $i++)
      {
           if(trim($_POST["name"][$i] != ''))
           {
             echo $_POST["name"][$i] . "<br>";
                // $sql = "INSERT INTO tbl_name(name) VALUES('".mysqli_real_escape_string($connect, $_POST["name"][$i])."')";
                // mysqli_query($connect, $sql);
           }
      }
      echo "Data Inserted" . "<br>";
 }
 else
 {
      echo "Please Enter Name" . "<br>";
 }

 if($number2 > 0)
 {
      for($i=0; $i<$number2; $i++)
      {
           if(trim($_POST["select"][$i] != ''))
           {
             echo $_POST["select"][$i] . "<br>";
                // $sql = "INSERT INTO tbl_name(name) VALUES('".mysqli_real_escape_string($connect, $_POST["name"][$i])."')";
                // mysqli_query($connect, $sql);
           }
      }
      echo "Data Inserted" . "<br>";
 }
 else
 {
      echo "Please Enter Select";
 }
 ?>
