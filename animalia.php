<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="utf-8">
     <title>Animal List</title>
     <?php include 'template/head.php'; ?>
   </head>
   <body>
      <div id="wrapper">
         <?php include 'template/navbar.php'; ?>
         <div id="page-wrapper">
            <!-- START -->
            <table id="example" class="table table-striped table-bordered table-hover">
               <tbody class="table table-striped table-bordered table-hover">
                  <th style="text-align:center;" class="text-uppercase">No</th>
                  <th style="text-align:center;" class="text-uppercase">Link</th>
                  <th style="text-align:center;" class="text-uppercase">Status</th>
                    <?php
                      include 'koneksi.php';
                      $query = "SELECT * FROM tb_test";
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
                           <td>'.$row['info'].'</td>
                           <td class="'.$warna.'" style="text-align:center;">'.$flag.'</td>
                        </tr>
                        ';
                      }
                     ?>
               </tbody>
            </table>
            <!-- END -->
         </div>
      <?php include 'template/script.php'; ?>
      <?php include 'template/footer.php'; ?>
   </body>
</html>
