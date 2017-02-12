<?php
  include "../koneksi.php";
  $postid = $_POST["select"];
  $query=("UPDATE tb_web SET label = 1 WHERE id=$postid;");
  $hasil = mysqli_query($con,$query);
  //var_dump($query);
  header("location: ../index.php");
 ?>
