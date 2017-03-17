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
            $html2= str_get_html($inputhasil);

            if (!empty($html2->find('a',0)->innertext)) {
              $a = $html2->find('a',0)->innertext;
              $querya = "INSERT INTO tmp (th) VALUES ('$a')";
              mysqli_query($con,$querya);
              $last_id = mysqli_insert_id($con);
              $updatecount=0;
            }

            elseif($inputhasil!='<div><!-- --></div>')
              {
                if($updatecount!=1)
                {
                  $queryb = "UPDATE tmp SET td='$inputhasil' WHERE id=$last_id";
                  mysqli_query($con,$queryb);
                  $updatecount++;
                }
              }
          }
          //  $query = "UPDATE tb_test SET label=1 WHERE id=$row[id]";
          //  mysqli_query($con,$query);
        }
    ?>
    </div>
  </body>
</html>
