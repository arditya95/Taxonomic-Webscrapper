<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <?php
                include_once '../../../setting/koneksi.php';
                $sql=("SELECT * FROM tb_ciri_species
                       INNER JOIN tb_species
                       ON tb_ciri_species.`id_species`=tb_species.`id_species`
                       WHERE tb_ciri_species.`id_species` = '$_GET[idt]' AND id_ciri = '$_GET[idc]'");
                $result = mysqli_query($con,$sql);
                $baris=mysqli_fetch_array($result);
              ?>
              <label>Edit Ciri Species <?php echo $baris['nama_species'];?></label>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" action="update_c_species.php" method="post">
                <div class="container-fluid">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="idt" value="<?php echo $baris['id_species'];?>">
                    <input type="hidden" class="form-control" name="idc" value="<?php echo $baris['id_ciri'];?>">
                    <label for="taxon">Species</label>
                    <?php
                      $query=("SELECT * FROM tb_species");
                      $hasil = mysqli_query($con,$query);
                      $select= '<select name="taxon" class="form-control">';
                      while($row=mysqli_fetch_array($hasil))
                        {
                          if ($baris['id_species']==$row['id_species']) {
                            $select.='<option selected="selected" value="'.$row['id_species'].'">'.$row['nama_species'].'</option>';
                          }else {
                            $select.='<option value="'.$row['id_species'].'">'.$row['nama_species'].'</option>';
                          }
                        }
                      $select.='</select>';
                      echo $select;
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="ciri">Ciri</label>
                    <?php
                      $query=("SELECT * FROM tb_ciri");
                      $hasil = mysqli_query($con,$query);
                      $select= '<select name="ciri" class="form-control">';
                      while($row=mysqli_fetch_array($hasil))
                        {
                          if ($baris['id_ciri']==$row['id_ciri']) {
                            $select.='<option selected="selected" value="'.$row['id_ciri'].'">'.$row['ciri'].'</option>';
                          }else {
                            $select.='<option value="'.$row['id_ciri'].'">'.$row['ciri'].'</option>';
                          }
                        }
                      $select.='</select>';
                      echo $select;
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="8" cols="80"><?php echo $baris['keterangan_cspecies'];?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="referensi">Referensi</label>
                    <?php
                      $query=("SELECT * FROM tb_referensi");
                      $hasil = mysqli_query($con,$query);
                      $select= '<select name="referensi" class="form-control">';
                      while($row=mysqli_fetch_array($hasil))
                        {
                          if ($baris['id_referensi']==$row['id_referensi']) {
                            $select.='<option selected="selected" value="'.$row['id_referensi'].'">'.$row['link'].'</option>';
                          }else {
                            $select.='<option value="'.$row['id_referensi'].'">'.$row['link'].'</option>';
                          }
                        }
                      $select.='</select>';
                      echo $select;
                    ?>
                  </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Save">
                <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="btn btn-primary" role="button">Back</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
