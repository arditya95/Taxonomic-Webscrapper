<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="utf-8">
     <title>Taxonomic Data Grabbing</title>
     <?php include 'template/head.php'; ?>
   </head>
   <body>
      <div id="wrapper">
         <?php include 'template/navbar.php'; ?>
         <div id="page-wrapper">
            <!-- START -->
            <?php
              include 'koneksi.php';
              $query = "SELECT * FROM tb_ciri RIGHT JOIN tb_ciri_species ON tb_ciri.`id_ciri` = tb_ciri_species.`id_ciri`
                        RIGHT JOIN tb_species ON tb_ciri_species.`id_species`=tb_species.`id_species`
                        RIGHT JOIN tb_genus ON tb_species.`id_genus` = tb_genus.`id_genus`
                        RIGHT JOIN tb_family ON tb_genus.`id_family` = tb_family.`id_family`
                        RIGHT JOIN tb_ordo ON tb_family.`id_ordo` = tb_ordo.`id_ordo`
                        RIGHT JOIN tb_class ON tb_ordo.`id_class` = tb_class.`id_class`
                        RIGHT JOIN tb_phylum ON tb_class.`id_phylum` = tb_phylum.`id_phylum`
                        RIGHT JOIN tb_kingdom ON tb_phylum.`id_kingdom` = tb_kingdom.`id_kingdom`
                        WHERE tb_species.id_species='$_GET[id]';";
              $result = mysqli_query($con,$query);
              $row = mysqli_fetch_array($result);
              echo "Nama Kingdom" . " -> " . $row['nama_kingdom'] . "<br>";
              echo "Nama Phylum" . " -> " . $row['nama_phylum'] . "<br>";
              echo "Nama Class" . " -> " . $row['nama_class'] . "<br>";
              echo "Nama Ordo" . " -> " . $row['nama_ordo'] . "<br>";
              echo "Nama Family" . " -> " . $row['nama_family'] . "<br>";
              echo "Nama Genus" . " -> " . $row['nama_genus'] . "<br>";
              echo "Nama Species" . " -> " . $row['nama_species'] . "<br>";
              echo "ID Species" . " -> " . $row['id_species'] . "<br>";
              echo $row['ciri'] . " -> " . $row['keterangan_cspecies'] . "<br>";
              while($row = mysqli_fetch_array($result)){
                echo $row['ciri'] . " -> " . $row['keterangan_cspecies'] . "<br>";
              }
            ?>
            <!-- END -->
         </div>
         </div>
      <?php include 'template/script.php'; ?>
      <?php include 'template/footer.php'; ?>
   </body>
</html>
