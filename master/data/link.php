<?php include_once 'konfirmasi.php'; ?>
<div class="panel panel-primary">
  <div class="panel-body">
    <!-- START -->
    <table id="dataTables" class="table table-striped table-bordered table-hover">
      <thead>
        <th style="text-align:center;" class="text-uppercase">No</th>
        <th style="text-align:center;" class="text-uppercase">Link</th>
        <th style="text-align:center;" class="text-uppercase">Status</th>
        <th style="text-align:center;" class="text-uppercase">Action</th>
      </thead>
       <tbody class="table table-striped table-bordered table-hover">
            <?php
              $query = "SELECT * FROM tb_link";
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
                echo "
                <tr>
                   <td style='text-align:center;'>$row[id]</td>
                   <td> <a href=$row[info]>$row[info]</a></td>
                   <td class=$warna style='text-align:center;'>$flag</td>
                   <td style='text-align:center;'>
                   <a href='master\action\update\link.php?id=$row[id]'>
                   <i class='fa fa-pencil-square-o' aria-hidden='true'></i>Edit</a> |
                   <a href='master\action\delete\delete_link.php?id=$row[id]' class='delete'>
                   <i class='fa fa-times' aria-hidden='true'></i>Delete</a></td>
                </tr>
                ";
              }
             ?>
       </tbody>
    </table>
    <!-- END -->
  </div>
</div>
