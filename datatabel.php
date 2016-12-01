<!DOCTYPE html>
<html>
       <head>
              <title></title>
       </head>
       <body>
              <table id="idtabel" class="table table-striped table-bordered table-hover">
                       <thead>
                          <tr>
                             <th style="text-align:center;" class="text-uppercase">ID</th>
                             <th style="text-align:center;" class="text-uppercase">Link</th>
                             <th style="text-align:center;" class="text-uppercase">Label</th>
                          </tr>
                       </thead>
                        <tbody class="table table-striped table-bordered table-hover">
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
              <script>
                     $(document).ready(function() {
                        $('#idtabel').DataTable();
                     } );
              </script>
       </body>

</html>
