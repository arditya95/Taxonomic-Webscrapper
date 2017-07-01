<?php include_once 'konfirmasi.php'; ?>
<!-- Animalia -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <label>Data Genus</label>
  </div>
  <div class="panel-body">
    <a href="master\action\insert\genus.php" class="btn btn-primary" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i>
  Tambah Data</a>
      <table id="dataTables" class="table table-striped table-bordered table-hover">
        <thead>
          <th style="text-align:center;" class="text-uppercase">No</th>
          <th style="text-align:center;" class="text-uppercase">Genus</th>
          <th style="text-align:center;" class="text-uppercase">Action</th>
        </thead>
          <tbody class="table table-striped table-bordered table-hover">
            <?php
              // include_once '../../../setting/koneksi.php';
              $no=1;
              $query = "SELECT * FROM tb_genus
                        GROUP BY nama_genus;";
              $result = mysqli_query($con,$query);
              //var_dump($result);
              while ($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                   <td style='text-align:center;' >".$no."</td>
                   <td style='text-align:left;'> <a href=route.php?d=master/data&p=c_genus&idt=$row[id_genus]>$row[nama_genus]</a></td>
                   <td style='text-align:center;'>
                   <a href='master\action\update\genus.php?id=$row[id_genus]'>
                   <i class='fa fa-pencil-square-o' aria-hidden='true'></i>Edit</a> |
                   <a href='master\action\delete\delete_genus.php?id=$row[id_genus]' class='delete'>
                   <i class='fa fa-times' aria-hidden='true'></i>Delete</a></td>
                </tr>
                ";
                $no++;
              }
            ?>
          </tbody>
      </table>
  </div>
</div>
<!-- Animalia -->
