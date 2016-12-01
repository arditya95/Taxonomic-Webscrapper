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
                  <th style="text-align:center;" class="text-uppercase">Label</th>
                  <th style="text-align:center;" class="text-uppercase">ID</th>
                  <th style="text-align:center;" class="text-uppercase">Link</th>
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
            <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> // JQuery Reference
            <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.js"></script>
            <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/jqueryui/dataTables.jqueryui.css">
               <script>
                  $(function(){
                   $("#example").dataTable();
                  })
               </script>
            <!-- END -->
         </div>
      <?php include 'template/script.php'; ?>
   </body>
</html>
