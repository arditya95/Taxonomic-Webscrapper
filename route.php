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
                if ($_GET['kode']=="data_species") {
                  require_once 'master/data/species.php';
                }
                elseif ($_GET['kode']=="data_genus") {
                  require_once 'master/data/genus.php';
                }
                elseif ($_GET['kode']=="data_family") {
                  require_once 'master/data/family.php';
                }
                elseif ($_GET['kode']=="data_ordo") {
                  require_once 'master/data/ordo.php';
                }
                elseif ($_GET['kode']=="data_class") {
                  require_once 'master/data/class.php';
                }
                elseif ($_GET['kode']=="data_phylum") {
                  require_once 'master/data/phylum.php';
                }
                elseif ($_GET['kode']=="data_kingdom") {
                  require_once 'master/data/kingdom.php';
                }
                elseif ($_GET['kode']=="data_ciri") {
                  require_once 'master/data/ciri.php';
                }
                elseif ($_GET['kode']=="data_habitat") {
                  require_once 'master/data/habitat.php';
                }
                elseif ($_GET['kode']=="data_wilayah") {
                  require_once 'master/data/wilayah.php';
                }
                elseif ($_GET['kode']=="data_referensi") {
                  require_once 'master/data/referensi.php';
                }
                elseif ($_GET['kode']=="data_link") {
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
