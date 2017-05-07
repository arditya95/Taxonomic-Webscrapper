<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Download Image</title>
  </head>
  <body>
    <?php
      $url = 'http://a-z-animals.com/media/animals/images/470x370/albatross3.jpg';
      $img = '../img/flower.jpg';
      file_put_contents($img, file_get_contents($url));
      echo "Selesai";
     ?>
  </body>
</html>
