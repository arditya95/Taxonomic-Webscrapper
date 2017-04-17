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
    $query = "SELECT * FROM tb_ciri
			        INNER JOIN tb_ciri_species
			        ON tb_ciri.`id_ciri` = tb_ciri_species.`id_ciri`
			        INNER JOIN tb_species
			        ON tb_ciri_species.`id_species`=tb_species.`id_species`
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
              ON tb_phylum.`id_kingdom` = tb_kingdom.`id_kingdom`
              WHERE tb_species.'id_species'=2;";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_array($result)){
      //echo $row['nama_kingdom'];
    }
  ?>

</body>
</html>
