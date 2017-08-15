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
                          LEFT JOIN tb_genus USING(id_genus)
                          LEFT JOIN tb_family USING(id_family)
                          LEFT JOIN tb_ordo USING(id_ordo)
                          LEFT JOIN tb_class USING(id_class)
                          LEFT JOIN tb_phylum USING(id_phylum)
                          LEFT JOIN tb_kingdom USING (id_kingdom)
                          LEFT JOIN tb_gambar_species USING(id_species)
                          LEFT JOIN tb_ciri_species USING(id_species)
                          LEFT JOIN tb_ciri USING(id_ciri)
                          WHERE tb_species.id_species='$_GET[id]';";
                $result = mysqli_query($con,$query);
                $row = mysqli_fetch_array($result);
                ?>
                <?php
                if (!Empty($row['gambar_species'])) {
                  $gambar=$row['gambar_species'];
                }else {
                  $gambar="img/no_image.jpg";
                }
                 ?>
                <img src="<?php echo $gambar; ?>" class="img-rounded">
                <?php
                if (empty($row['deskripsi_species'])) {
                  $deskripsi="<td style='text-align:center;'>Data tidak tersedia saat ini</td>";
                }
                else {
                  $deskripsi="<td style='text-align:justify;'>$row[deskripsi_species]</td>";
                }
                if (empty($row['ciri'])) {
                  $ciri="";
                }
                else {
                  $ciri="<td style='text-align:center;''>$row[ciri]</td>";
                }
                if (empty($row['keterangan_cspecies'])) {
                  $keterangan="";
                }
                else {
                  $keterangan="<td style='text-align:center;'>$row[keterangan_cspecies]</td>";
                }
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
                '.$deskripsi.'
                </tr>
                <tr>
                '.$ciri.'
                '.$keterangan.'
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
