<?php
include 'setting/koneksi.php';
 ?>
<?php include 'template/head.php'; ?>
         <!-- /.row -->
         <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-default">
                     <!-- /.panel-heading -->
                     <div class="panel-body">
                         <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                             <thead>
                                 <tr>
                                     <th>No.</th>
                                     <th>Nama ciri</th>
                                 </tr>
                             </thead>
                             <tbody>
                             <?php
                                 $perintah=mysqli_query($con,"select * from tb_ciri");
                                 $baris=mysqli_num_rows($perintah);
                                 $i = 1;
                                 while ($tampil=mysqli_fetch_array($perintah)){
                               ?>
                                 <tr class="odd gradeX">
                                     <td><?php echo"$i"; ?></td>
                                     <td><?php echo"$tampil[ciri]"; ?></td>
                                     <?php $i++; } ?>
                                 </tr>
                             </tbody>
                         </table>
                         <!-- /.table-responsive -->
                     </div>
                     <!-- /.panel-body -->
                 </div>
                 <!-- /.panel -->
             </div>
             <!-- /.col-lg-12 -->
         </div>

<?php include 'template/script.php'; ?>
