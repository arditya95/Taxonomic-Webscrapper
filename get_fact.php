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
      include("simple_html_dom.php");

      $pilih = "SELECT * FROM tb_test WHERE id = 4";
      $hasil = mysqli_query($con,$pilih);
      while ($row = mysqli_fetch_array($hasil))
       {
         $html = file_get_html($row['info']);
         foreach($html->find('table.az-facts td') as $e)
           {
            $inputhasil = $e->innertext;
            echo $inputhasil;
              //if($inputhasil == "<div><!-- --></div>"){
                //echo "Putus";
              }
            //$inputquery = "INSERT INTO tmp (isi) VALUES ('$inputhasil')";
            //mysqli_query($con,$inputquery);
            // var_dump($inputhasil);
           }
           //$query = "UPDATE tb_test SET label=1 WHERE id=$row[id]";
           //mysqli_query($con,$query);
       echo "SELESAI";
     ?>
     </div>
  </body>
</html>
