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
           <div class="panel panel-primary">
             <div class="panel-body">
               <!-- START -->
               <table id="dataTables" class="table table-striped table-bordered table-hover">
                 <thead>
                   <th style="text-align:center;" class="text-uppercase">No</th>
                   <th style="text-align:center;" class="text-uppercase">Link</th>
                   <th style="text-align:center;" class="text-uppercase">Status</th>
                 </thead>
                  <tbody class="table table-striped table-bordered table-hover">
                       <?php
                         $query = "SELECT * FROM tb_link";
                         $result = mysqli_query($con,$query);
                         while ($row = mysqli_fetch_array($result))
                         {
                           if ($row['label']==1) {
                              $flag="Checked";
                              $warna="success";
                           }
                           if ($row['label']==0) {
                              $flag="Uncheked";
                              $warna="danger";
                           }
                           echo '
                           <tr>
                              <td style="text-align:center;">'.$row['id'].'</td>
                              <td> <a href="'.$row['info'].'">'.$row['info'].'</a></td>
                              <td class="'.$warna.'" style="text-align:center;">'.$flag.'</td>
                           </tr>
                           ';
                         }
                        ?>
                  </tbody>
               </table>
               <!-- END -->
             </div>
           </div>
         </div>
         </div>
      <?php include_once 'template/script.php'; ?>
      <?php include_once 'template/footer.php'; ?>
   </body>
</html>
