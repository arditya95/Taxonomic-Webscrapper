<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Thumbnail dinamis</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>

  <?php
    include 'koneksi.php';
    $query = "SELECT * FROM tb_phylum WHERE tb_phylum.`id_kingdom`=1";
    $result = mysqli_query($con,$query);
  ?>

  <?php while($row = mysqli_fetch_assoc($result)):?>
    <div class="row" >
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <div class="caption">
            <h3> <?= $row['phylum']; ?> </h3>
            <p>  <?= $row['phylum']; ?> </p>
            <p class="tag"> Tag: <?= $row['id_phylum']; ?> </p>
            <a href="lihat.php?id=<?php echo $row['id_phylum']; ?>" target="_self" class="btn btn-primary"> Lihat Selengkapnya </a>
          </div>
        </div>
      </div>
  <?php endwhile; ?>
    </div><!--akhir thumbnail row-->

</body>
</html>
