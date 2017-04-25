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
              <label>Edit Ordo</label>
            </div>

            <?php
              Include "../../../koneksi.php";
              $sql=("SELECT * FROM tb_ordo WHERE id_ordo = '$_GET[id]'");
              $result = mysqli_query($con,$sql);
              $baris=mysqli_fetch_array($result);
            ?>

            <div class="panel-body">
              <form class="form-horizontal" action="update_ordo.php" method="post">
                <div class="container-fluid">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $baris['id_ordo'];?>">
                    <label for="nama">Nama Ordo</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $baris['nama_ordo'];?>">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="8" cols="80"><?php echo $baris['deskripsi_ordo'];?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="golongan">Golongan Class</label>
                    <?php
                      Include "../../../koneksi.php";
                      $query=("SELECT * FROM tb_class");
                      $hasil = mysqli_query($con,$query);
                      $select= '<select name="golongan" class="form-control">';
                      while($row=mysqli_fetch_array($hasil))
                        {
                          if ($baris['id_class']==$row['id_class']) {
                            $select.='<option selected="selected" value="'.$row['id_class'].'">'.$row['nama_class'].'</option>';
                          }else {
                            $select.='<option value="'.$row['id_class'].'">'.$row['nama_class'].'</option>';
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
