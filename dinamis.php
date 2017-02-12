<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>
    <div id="wrapper">

    <?php
      Include "koneksi.php";
      $pilih = "SELECT * FROM tb_content_web WHERE id = 3";
      $hasil = mysqli_query($con,$pilih);
      $row = mysqli_fetch_assoc($hasil);
      $isi = $row['content'];
      eval("?>".$isi."<?");
     ?>

     </div>
  </body>
</html>
