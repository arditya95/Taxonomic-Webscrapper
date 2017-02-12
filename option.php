<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>

  <body>
  <form class="form-horizontal" action="#" method="post">
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <label>MAIN MENU</label>
          </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered">
                <?php
                  Include "koneksi.php";
                  $query=("SELECT id, nama FROM tb_web");
                  $hasil = mysqli_query($con,$query);
                  $select= '<select name="select" class="form-control">';
                  while($row=mysqli_fetch_array($hasil))
                    {
                        $select.='<option value="'.$row['id'].'">'.$row['nama'].'</option>';
                    }
                  $select.='</select>';
                  echo $select;
                ?>
              </table>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
      </div>
    </div>
  </form>
  </body>

</html>
