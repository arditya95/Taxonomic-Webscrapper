<!-- Animalia -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <label>Data Kingdom</label>
  </div>
  <div class="panel-body">
    <a href="master\action\insert\kingdom.php" class="btn btn-primary" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i>
  Tambah Data</a>
      <table id="dataTables" class="table table-striped table-bordered table-hover">
        <thead>
          <th style="text-align:center;" class="text-uppercase">No</th>
          <th style="text-align:center;" class="text-uppercase">Kingdom</th>
          <th style="text-align:center;" class="text-uppercase">Action</th>
        </thead>
          <tbody class="table table-striped table-bordered table-hover">
            <?php
              // include_once '../../../setting/koneksi.php';
              $no=1;
              $query = "SELECT * FROM tb_species
LEFT JOIN tb_genus USING(id_genus)
LEFT JOIN tb_family USING(id_family)
LEFT JOIN tb_ordo USING(id_ordo)
LEFT JOIN tb_class USING(id_class)
LEFT JOIN tb_phylum USING(id_phylum)
LEFT JOIN tb_kingdom USING (id_kingdom)
LEFT JOIN tb_gambar_species USING(id_species)
LEFT JOIN tb_ciri_species USING(id_species)
LEFT JOIN tb_ciri USING(id_ciri)
GROUP BY tb_species.`nama_species;";
              $result = mysqli_query($con,$query);
              //var_dump($result);
              while ($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                   <td style='text-align:center;' >".$no."</td>
                   <td style='text-align:left;'> <a href=route.php?d=master/data&p=c_kingdom&idt=$row[id_kingdom]>$row[nama_kingdom]</a></td>
                   <td style='text-align:center;'>
                   <a href='master\action\update\kingdom.php?id=$row[id_kingdom]'>
                   <i class='fa fa-pencil-square-o' aria-hidden='true'></i>Edit</a> |
                   <a href='master\action\delete\delete_kingdom.php?id=$row[id_kingdom]' class='delete'>
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
