<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="utf-8">
     <title>Taxonomic Data Grabbing</title>
     <?php include_once 'template/head.php'; ?>
   </head>
   <body>
      <div id="wrapper">
         <?php include_once 'template/navbar.php'; ?>
         <?php include_once 'setting/koneksi.php'; ?>
         <div id="page-wrapper">
            <!-- START -->
            <table id="example" class="table table-striped table-bordered table-hover">
              <tbody class="table table-striped table-bordered table-hover">
                <?php
                $query = "SELECT * FROM tb_species
                          RIGHT JOIN tb_genus USING(id_genus)
                          RIGHT JOIN tb_family USING(id_family)
                          RIGHT JOIN tb_ordo USING(id_ordo)
                          RIGHT JOIN tb_class USING(id_class)
                          RIGHT JOIN tb_phylum USING(id_phylum)
                          RIGHT JOIN tb_kingdom USING (id_kingdom)
                          RIGHT JOIN tb_gambar_species USING(id_species)
                          RIGHT JOIN tb_ciri_species USING(id_species)
                          RIGHT JOIN tb_ciri USING(id_ciri)
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
                <td style="text-align:center;">Deskripsi</td>
                <td style="text-align:justify;">'.$row['deskripsi_species'].'</td>
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
                // echo'
                // <tr>
                // <td style="text-align:center;">Deskripsi</td>
                // <td style="text-align:center;">'.$row['deskripsi_species'].'</td>
                // </tr>';
                ?>
              </tbody>
            </table>
            <!-- END -->
         </div>
         </div>
      <?php include_once 'template/script.php'; ?>
      <?php include_once 'template/footer.php'; ?>
   </body>
</html>
