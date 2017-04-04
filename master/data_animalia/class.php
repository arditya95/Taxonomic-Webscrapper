<!-- Animalia -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <label>Class</label>
  </div>
  <div class="panel-body">
      <table id="example" class="table table-striped table-bordered table-hover">
          <tbody class="table table-striped table-bordered table-hover">
            <th style="text-align:center;" class="text-uppercase">No</th>
            <th style="text-align:center;" class="text-uppercase">Class</th>
            <th style="text-align:center;" class="text-uppercase">Action</th>
            <?php
              include 'koneksi.php';
              $no=1;
              $query = "SELECT * FROM tb_species
                        INNER JOIN tb_genus
                        ON tb_species.`id_genus` = tb_genus.`id_genus`
                        INNER JOIN tb_family
                        ON tb_genus.`id_family` = tb_family.`id_family`
                        INNER JOIN tb_ordo
                        ON tb_family.`id_ordo` = tb_ordo.`id_ordo`
                        INNER JOIN tb_class
                        ON tb_ordo.`id_class` = tb_class.`id_class`
                        INNER JOIN tb_phylum
                        ON tb_class.`id_phylum` = tb_phylum.`id_phylum`
                        INNER JOIN tb_kingdom
                        ON tb_phylum.`id_kingdom` = tb_kingdom.`id_kingdom`
                        GROUP BY nama_class;";
              $result = mysqli_query($con,$query);
              //var_dump($result);
              while ($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                   <td style='text-align:center;' >".$no."</td>
                   <td style='text-align:center;'>".$row['nama_class']."</td>
                   <td style='text-align:center;'>
                   <a href='..\action\update\class.php?id=$row[id_class]'>Edit</a> |
                   <a href='..\action\delete\delete_class.php?id=$row[id_class]'>Delete</a></td>
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
