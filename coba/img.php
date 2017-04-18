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
       Include "../koneksi.php";
       include("../simple_html_dom.php");
       $pilih = "SELECT * FROM tb_link where id=17";
       $hasil = mysqli_query($con,$pilih);
       while ($row = mysqli_fetch_array($hasil))
        {
          $html = file_get_html($row['info']);
           //AWAL BAGIAN MENGANBIL GAMBAR//
           foreach($html->find('a') as $e){
             $hasilimg = "http://a-z-animals.com" . $e->src;
             echo $hasilimg ."<br>";
             $ext = pathinfo($hasilimg, PATHINFO_EXTENSION);
             if ($ext=="jpg") {
              //  echo $hasilimg ."<br>";
              //  echo $ext ."<br>";
              //  $querya = "INSERT INTO tmp (th,td) VALUES ('Image','$hasilimg')";
              //  mysqli_query($con,$querya);
              }
            }
            //AKHIR BAGIAN MENGANBIL GAMBAR//

         }
     ?>
     <?php
     $ext = pathinfo("https://a-z-animals.com/media/animals/images/big_tortoise.png", PATHINFO_EXTENSION);
     echo $ext;
      ?>
     </div>
   </body>
 </html>
