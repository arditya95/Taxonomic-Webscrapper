<?php include_once 'konfirmasi.php'; ?>
<!-- Animalia -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <?php
      // include_once '../../../setting/koneksi.php';
      $sql=("SELECT * FROM tb_species
             WHERE tb_species.`id_species` = '$_GET[idt]'");
      $result = mysqli_query($con,$sql);
      $baris=mysqli_fetch_array($result);
    ?>
    <label>Ciri Species <?php echo $baris['nama_species'];?></label>
  </div>
  <div class="panel-body">
    <a href="master\action\insert\c_species.php" class="btn btn-primary" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i>
  Tambah Data Ciri</a>
      <table id="dataTables" class="table table-striped table-bordered table-hover">
        <thead>
          <th style="text-align:center;" class="text-uppercase">No</th>
          <th style="text-align:center;" class="text-uppercase">Ciri</th>
          <th style="text-align:center;" class="text-uppercase">Deskripsi</th>
          <th style="text-align:center;" class="text-uppercase">Link</th>
          <th style="text-align:center;" class="text-uppercase">Action</th>
        </thead>
          <tbody class="table table-striped table-bordered table-hover">
            <?php
              // include_once '../../../setting/koneksi.php';
              $no=1;
              $query = "SELECT * FROM tb_ciri_species
                        LEFT JOIN tb_species
                        ON tb_species.`id_species`=tb_ciri_species.`id_species`
                        LEFT JOIN tb_ciri
                        ON tb_ciri.`id_ciri`=tb_ciri_species.`id_ciri`
                        LEFT JOIN tb_referensi
                        ON tb_referensi.`id_referensi`=tb_ciri_species.`id_referensi`
                        WHERE tb_ciri_species.`id_species` = '$_GET[idt]';";
              $result = mysqli_query($con,$query);
              //var_dump($result);
              while ($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                   <td style='text-align:center;' >".$no."</td>
                   <td style='text-align:left;'>".$row['ciri']."</td>
                   <td style='text-align:left;'>".$row['keterangan_cspecies']."</td>
                   <td style='text-align:left;'>".$row['link']."</td>
                   <td style='text-align:center;'>
                   <a href='master\action\update\c_species.php?idt=$row[id_species]&idc=$row[id_ciri]'>
                   <i class='fa fa-pencil-square-o' aria-hidden='true'></i>Edit</a> |
                   <a href='master\action\delete\delete_c_species.php?idt=$row[id_species]&idc=$row[id_ciri]' class='delete'>
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
