<?php include_once 'konfirmasi.php'; ?>
<!-- Animalia -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <?php
      // include_once '../../../setting/koneksi.php';
      $sql=("SELECT * FROM tb_genus
             WHERE tb_genus.`id_genus` = '$_GET[idt]'");
      $result = mysqli_query($con,$sql);
      $baris=mysqli_fetch_array($result);
    ?>
    <label>Ciri Genus <?php echo $baris['nama_genus'];?></label>
  </div>
  <div class="panel-body">
    <a href="master\action\insert\c_genus.php" class="btn btn-primary" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i>
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
              $query = "SELECT * FROM tb_ciri_genus
                        LEFT JOIN tb_genus
                        ON tb_genus.`id_genus`=tb_ciri_genus.`id_genus`
                        LEFT JOIN tb_ciri
                        ON tb_ciri.`id_ciri`=tb_ciri_genus.`id_ciri`
                        LEFT JOIN tb_referensi
                        ON tb_referensi.`id_referensi`=tb_ciri_genus.`id_referensi`
                        WHERE tb_ciri_genus.`id_genus` = '$_GET[idt]';";
              $result = mysqli_query($con,$query);
              //var_dump($result);
              while ($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                   <td style='text-align:center;' >".$no."</td>
                   <td style='text-align:left;'>".$row['ciri']."</td>
                   <td style='text-align:left;'>".$row['keterangan_cgenus']."</td>
                   <td style='text-align:left;'>".$row['link']."</td>
                   <td style='text-align:center;'>
                   <a href='master\action\update\c_genus.php?idt=$row[id_genus]&idc=$row[id_ciri]'>
                   <i class='fa fa-pencil-square-o' aria-hidden='true'></i>Edit</a> |
                   <a href='master\action\delete\delete_c_genus.php?idt=$row[id_genus]&idc=$row[id_ciri]' class='delete'>
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
