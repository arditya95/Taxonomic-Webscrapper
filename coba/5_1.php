<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Thumbnail Dinamis</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>

  <?php
    include '../koneksi.php';
    $query = "SELECT * FROM tb_species
              INNER JOIN tb_genus
              ON tb_species.`id_genus` = tb_genus.`id_genus`
              INNER JOIN tb_family
              ON tb_genus.`id_family` = tb_family.`id_family`
              INNER JOIN tb_ordo
              ON tb_family.`id_ordo` = tb_ordo.`id_ordo`
              INNER JOIN tb_class
              ON tb_ordo.`id_class` = tb_class.`id_class`
              INNER JOIN tb_phylum
              ON tb_class.`id_phylum` = tb_phylum.`id_phylum`
              INNER JOIN tb_kingdom
              ON tb_phylum.`id_kingdom` = tb_kingdom.`id_kingdom`;";
    $result = mysqli_query($con,$query);
  ?>

  <div class="row" >
  <?php while($row = mysqli_fetch_assoc($result)):?>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <div class="caption">
            <h3> <?= $row['nama_kingdom']; ?> </h3>
            <p>  <?= $row['nama_species']; ?> </p>
            <a href="lihat.php?id=<?php echo $row['id_species']; ?>" target="_blank" class="btn btn-primary"> Lihat Selengkapnya </a>
          </div>
        </div>
      </div>
  <?php endwhile; ?>
</div><!--akhir thumbnail row-->

</body>
</html>
