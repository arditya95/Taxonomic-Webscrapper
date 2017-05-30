<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>
  <body>
    <div id="wrapper">

    <?php
    set_time_limit(0);
      Include "koneksi.php";
      include("simple_html_dom.php");
         $html = file_get_html("https://a-z-animals.com/animals/african-bush-elephant/");
         foreach($html->find('div[id=jump-article]') as $e)
           {
            $inputhasil = $e->plaintext;
            $inputquery = "INSERT INTO tb_descrip (descrip) VALUES ('$inputhasil')";
            mysqli_query($con,$inputquery);
            //var_dump($inputhasil);
           }
            echo "SELESAI";
     ?>

     <?php
        include_once 'koneksi.php';
        $sql = "SELECT * FROM tb_descrip";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
          echo $row['descrip'];
        }
     ?>

     </div>
  </body>
</html>
