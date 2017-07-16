<?php include_once 'konfirmasi.php'; ?>
<!-- Animalia -->
<div class="panel panel-primary">
  <div class="panel-heading">
    <label>Import History</label>
  </div>
  <div class="panel-body">
      <table id="dataTables" class="table table-striped table-bordered table-hover">
        <thead>
          <th style="text-align:center;" class="text-uppercase">No</th>
          <th style="text-align:center;" class="text-uppercase">File Path</th>
          <th style="text-align:center;" class="text-uppercase">Import Date</th>
        </thead>
          <tbody class="table table-striped table-bordered table-hover">
            <?php
              // include_once '../../../setting/koneksi.php';
              $no=1;
              $query = "SELECT * FROM import_detail ORDER BY import_date DESC;";
              $result = mysqli_query($con,$query);
              //var_dump($result);
              while ($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                   <td style='text-align:center;' >".$no."</td>
                   <td style='text-align:center;'>$row[file_path]</td>
                   <td style='text-align:center;'>$row[import_date]</td>
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
