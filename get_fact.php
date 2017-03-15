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

      $pilih = "SELECT * FROM tb_test WHERE id = 4";
      $hasil = mysqli_query($con,$pilih);
      while ($row = mysqli_fetch_array($hasil))
       {
         $html = file_get_html($row['info']);
         foreach($html->find('table.az-facts td') as $e)
           {
            $inputhasil = $e->innertext;
            $url="http://stackoverflow.com/questions/2280394/how-can-i-check-if-a-url-exists-via-php";
            $html2= str_get_html($inputhasil);
            $a= $html2->find('a',0)->innertext;

            // $html3= str_get_html($inputhasil);
            // $b= $html3->find('text',0)->plaintext;
            // print_r($b);

            // echo $inputhasil . "<br>";
            // var_dump($inputhasil);
            if ($a!=null)
              {
                $querya = "INSERT INTO tmp (th) VALUES ('$a')";
                mysqli_query($con,$querya);
                $last_id = mysqli_insert_id($con);
                $updatecount=0;
                // echo $last_id . " INI LAST ID". "<br>";
                // var_dump($querya);
                // break;
              }
              elseif($inputhasil!='<div><!-- --></div>'){
                if ($updatecount!=1) {
                  $queryb = "UPDATE tmp SET td='$inputhasil' WHERE id=$last_id";
                  mysqli_query($con,$queryb);
                  $updatecount++;
                  // echo $inputhasil ."<br>";
                }
                // var_dump($queryb);
                // break;
              }

            // echo $a ."<br>";
            // break;
            // var_dump($inputhasil);
            // echo $inputhasil."<br>";
            //  break;
              // if($a != null)
              // {
              //   // $inputquery = "INSERT INTO tmp (th,td) VALUES ('$a','$inputhasil')";
              //   // // mysqli_query($con,$inputquery);
              //   // var_dump($inputquery);
              //   // break;
              // }
            // $inputquery = "INSERT INTO tmp (isi) VALUES ('$inputhasil')";
            // echo $inputquery;
            // break;
            // mysqli_query($con,$inputquery);
            // var_dump($inputhasil);
            // exit;
           }
          //  $query = "UPDATE tb_test SET label=1 WHERE id=$row[id]";
          //  mysqli_query($con,$query);

      //  echo "SELESAI";
      //  echo "<br>";
     }
     ?>
     </div>
  </body>
</html>
