<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Coba gbif</title>

  </head>
  <body>
    <div id="wrapper">

    <?php
      Include "koneksi.php";
      include("simple_html_dom.php");
         $html = file_get_html("http://www.gbif.org/species/123595509");
         foreach($html->find('div[class=right] dt, dd') as $e)
           {
            $inputhasil = $e->innertext . '<br>';
            echo $inputhasil;
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
