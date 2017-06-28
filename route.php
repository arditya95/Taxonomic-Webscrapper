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
                  require_once 'master/data/species.php';
                }
                elseif ($_GET['kode']==2) {
                  require_once 'master/data/genus.php';
                }
                elseif ($_GET['kode']==3) {
                  require_once 'master/data/family.php';
                }
                elseif ($_GET['kode']==4) {
                  require_once 'master/data/ordo.php';
                }
                elseif ($_GET['kode']==5) {
                  require_once 'master/data/class.php';
                }
                elseif ($_GET['kode']==6) {
                  require_once 'master/data/phylum.php';
                }
                elseif ($_GET['kode']==7) {
                  require_once 'master/data/kingdom.php';
                }
                elseif ($_GET['kode']==8) {
                  require_once 'master/data/ciri.php';
                }
                elseif ($_GET['kode']==9) {
                  require_once 'master/data/habitat.php';
                }
                elseif ($_GET['kode']==10) {
                  require_once 'master/data/wilayah.php';
                }
                elseif ($_GET['kode']==11) {
                  require_once 'master/data/referensi.php';
                }
                elseif ($_GET['kode']==12) {
                  require_once 'master/data/link.php';
                }
                else {
                  require_once 'master/data/kingdom.php';
                }
              }
              else {
                require_once 'master/data/kingdom.php';
              }
            ?>
            <!-- END -->
         </div>
         </div>
      <?php require_once 'template/script.php'; ?>
      <?php require_once 'template/footer.php'; ?>
   </body>
</html>
