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
            <table id="example" class="table table-striped table-bordered table-hover">
              <tbody class="table table-striped table-bordered table-hover">
                <?php
                include 'koneksi.php';
                $query = "SELECT * FROM tb_ciri RIGHT JOIN tb_ciri_species ON tb_ciri.`id_ciri` = tb_ciri_species.`id_ciri`
                          RIGHT JOIN tb_species ON tb_ciri_species.`id_species`=tb_species.`id_species`
                          RIGHT JOIN tb_genus ON tb_species.`id_genus` = tb_genus.`id_genus`
                          LEFT JOIN tb_gambar_species ON tb_gambar_species.`id_species`=tb_species.`id_species`
                          RIGHT JOIN tb_family ON tb_genus.`id_family` = tb_family.`id_family`
                          RIGHT JOIN tb_ordo ON tb_family.`id_ordo` = tb_ordo.`id_ordo`
                          RIGHT JOIN tb_class ON tb_ordo.`id_class` = tb_class.`id_class`
                          RIGHT JOIN tb_phylum ON tb_class.`id_phylum` = tb_phylum.`id_phylum`
                          RIGHT JOIN tb_kingdom ON tb_phylum.`id_kingdom` = tb_kingdom.`id_kingdom`
                          WHERE tb_species.id_species='$_GET[id]';";
                $result = mysqli_query($con,$query);
                $row = mysqli_fetch_array($result);
                ?>
                <img src="<?php echo $row['gambar_species']; ?>" class="img-rounded">
                <?php
                echo '
                <tr>
                <td style="text-align:center;">Kingdom</td>
                <td style="text-align:center;">'.$row['nama_kingdom'].'</td>
                </tr>
                <tr>
                <td style="text-align:center;">Phylum</td>
                <td style="text-align:center;">'.$row['nama_phylum'].'</td>
                </tr>
                <tr>
                <td style="text-align:center;">Class</td>
                <td style="text-align:center;">'.$row['nama_class'].'</td>
                </tr>
                <tr>
                <td style="text-align:center;">Ordo</td>
                <td style="text-align:center;">'.$row['nama_ordo'].'</td>
                </tr>
                <tr>
                <td style="text-align:center;">Family</td>
                <td style="text-align:center;">'.$row['nama_family'].'</td>
                </tr>
                <tr>
                <td style="text-align:center;">Genus</td>
                <td style="text-align:center;">'.$row['nama_genus'].'</td>
                </tr>
                <tr>
                <td style="text-align:center;">Species</td>
                <td style="text-align:center;">'.$row['nama_species'].'</td>
                </tr>
                <tr>
                <td style="text-align:center;">'.$row['ciri'].'</td>
                <td style="text-align:center;">'.$row['keterangan_cspecies'].'</td>
                </tr>
                ';
                ?>
                <?php
                while($row = mysqli_fetch_array($result)){
                  echo '
                  <tr>
                  <td style="text-align:center;">'.$row['ciri'].'</td>
                  <td style="text-align:center;">'.$row['keterangan_cspecies'].'</td>
                  </tr>
                  ';
                }
                ?>
              </tbody>
            </table>
            <!-- END -->
         </div>
         </div>
      <?php include 'template/script.php'; ?>
      <?php include 'template/footer.php'; ?>
   </body>
</html>
