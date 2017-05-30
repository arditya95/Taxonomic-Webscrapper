<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="utf-8">
     <title>Taxonomic Data Grabbing</title>
     <?php require_once 'template/head.php'; ?>
   </head>
   <body>
      <div id="wrapper">
         <?php require_once 'template/navbar.php'; ?>
         <div id="page-wrapper">
            <!-- START -->
            <?php
              require_once 'setting/koneksi.php';
              if (isset($_GET['kode'])) {
                if ($_GET['kode']==1) {
                  require_once 'master/data_animalia/species.php';
                }
                elseif ($_GET['kode']==2) {
                  require_once 'master/data_animalia/genus.php';
                }
                elseif ($_GET['kode']==3) {
                  require_once 'master/data_animalia/family.php';
                }
                elseif ($_GET['kode']==4) {
                  require_once 'master/data_animalia/ordo.php';
                }
                elseif ($_GET['kode']==5) {
                  require_once 'master/data_animalia/class.php';
                }
                elseif ($_GET['kode']==6) {
                  require_once 'master/data_animalia/phylum.php';
                }
                elseif ($_GET['kode']==7) {
                  require_once 'master/data_animalia/kingdom.php';
                }
                else {
                  require_once 'master/data_animalia/pilih.php';
                }
              }
              else {
                require_once 'master/data_animalia/pilih.php';
              }
            ?>
            <!-- END -->
         </div>
         </div>
      <?php require_once 'template/script.php'; ?>
      <?php require_once 'template/footer.php'; ?>
   </body>
</html>
