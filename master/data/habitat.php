<?php include_once 'konfirmasi.php'; ?>
<!-- Animalia -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <label>Data Habitat</label>
  </div>
  <div class="panel-body">
    <a href="master\action\insert\habitat.php" class="btn btn-primary" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i>
  Tambah Data</a>
      <table id="example" class="table table-striped table-bordered table-hover">
          <tbody class="table table-striped table-bordered table-hover">
            <th style="text-align:center;" class="text-uppercase">No</th>
            <th style="text-align:center;" class="text-uppercase">Habitat</th>
            <th style="text-align:center;" class="text-uppercase">Action</th>
            <?php
              // include_once '../../../setting/koneksi.php';
              $no=1;
              $query = "SELECT * FROM tb_habitat;";
              $result = mysqli_query($con,$query);
              //var_dump($result);
              while ($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                   <td style='text-align:center;' >".$no."</td>
                   <td style='text-align:center;'>".$row['habitat']."</td>
                   <td style='text-align:center;'>
                   <a href='master\action\update\habitat.php?id=$row[id_habitat]'>
                   <i class='fa fa-pencil-square-o' aria-hidden='true'></i>Edit</a> |
                   <a href='master\action\delete\delete_habitat.php?id=$row[id_habitat]' class='delete'>
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
