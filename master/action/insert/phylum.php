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
              <label>Tambah Phylum</label>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" action="insert_phylum.php" method="post">
                <div class="container-fluid">
                  <div class="form-group">
                    <label for="nama">Nama Phylum</label>
                    <input type="text" class="form-control" name="nama">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="8" cols="80"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="golongan">Golongan Kingdom</label>
                    <?php
                      include_once '../../../setting/koneksi.php';
                      $query=("SELECT * FROM tb_kingdom");
                      $hasil = mysqli_query($con,$query);
                      $select= '<select name="golongan" class="form-control">';
                      $select.='<option selected="selected" value="0">Pilih Golongan</option>';
                      while($row=mysqli_fetch_array($hasil))
                        {
                            $select.='<option value="'.$row['id_kingdom'].'">'.$row['nama_kingdom'].'</option>';
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
