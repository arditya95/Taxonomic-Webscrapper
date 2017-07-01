<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="utf-8">
     <title>Taxonomic Data Grabbing</title>
     <?php include_once 'template/head.php'; ?>
     <style media="screen">
       .thumbnail{
         width: 300px;
         // or you could use percentage values for responsive layout
         // width : 100%;
         height: 300px;
         overflow: auto;
       }

       /*.thumbnail img{
         // your styles for the image
         width: 100%;
         height: auto;
         display: block;
       }*/
     </style>
   </head>
   <body>
      <div id="wrapper">
         <?php include_once 'template/navbar.php'; ?>
         <?php include_once 'setting/koneksi.php'; ?>
         <div id="page-wrapper">
            <!-- START -->
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
                        GROUP BY tb_species.`nama_species`;";
              $result = mysqli_query($con,$query);
            ?>

            <div class="row" >
            <?php while($row = mysqli_fetch_assoc($result)):?>
                <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <div class="thumbnail-image" style="text-align:center;">
                    <img src="<?php echo $row['gambar_species']; ?>" height="150" width="150" class="img-rounded" alt="Responsive image">
                    </div>
                    <div class="caption">
                      <h3> <?= $row['nama_species']; ?> </h3>
                      <p>  <?= $row['nama_kingdom']; ?> </p>
                      <a href="view_detail.php?id=<?php echo $row['id_species']; ?>" target="_self" class="btn btn-primary"> Lihat Selengkapnya </a>
                    </div>
                  </div>
                </div>
            <?php endwhile; ?>
          </div><!--akhir thumbnail row-->
            <!-- END -->
         </div>
         </div>
      <?php include_once 'template/script.php'; ?>
      <?php include_once 'template/footer.php'; ?>
   </body>
</html>
