<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <?php include 'template/head.php'; ?>
   </head>
   <body>
     <div id="wrapper">
     <?php include 'template/navbar.php'; ?>
     <?php
       Include "koneksi.php";
       $hasil = "hai sudah bisa masuk";
       $query = "INSERT INTO tb_test (info) VALUES ('$hasil')";
       mysqli_query($con,$query);
      ?>
      </div>
   </body>
 </html>
