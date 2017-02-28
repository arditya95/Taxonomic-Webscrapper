<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Species</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>

    <!-- Animalia -->
    <div class="panel panel-primary">
      <div class="panel-heading">
        <label>Species</label>
      </div>
      <div class="panel-body">
          <table id="example" class="table table-striped table-bordered table-hover">
              <tbody class="table table-striped table-bordered table-hover">
                <th style="text-align:center;" class="text-uppercase">No</th>
                <th style="text-align:center;" class="text-uppercase">Species</th>
                <?php
                  include 'koneksi.php';
                  $query = "SELECT tb_species.`id_species`, tb_species.`species` FROM tb_species
                            INNER JOIN tb_genus
                            ON tb_species.`id_genus` = tb_genus.`id_genus`
                            INNER JOIN tb_family
                            ON tb_genus.`id_family` = tb_family.`id_family`
                            INNER JOIN tb_order
                            ON tb_family.`id_order` = tb_order.`id_order`
                            INNER JOIN tb_class
                            ON tb_order.`id_class` = tb_class.`id_class`
                            INNER JOIN tb_phylum
                            ON tb_class.`id_phylum` = tb_phylum.`id_phylum`
                            INNER JOIN tb_kingdom
                            ON tb_phylum.`id_kingdom` = tb_kingdom.`id_kingdom`
                            WHERE tb_kingdom.`id_kingdom`=1;";
                  $result = mysqli_query($con,$query);
                  //var_dump($result);
                  while ($row = mysqli_fetch_array($result))
                  {
                    echo '
                    <tr>
                       <td style="text-align:center;">'.$row['id_species'].'</td>
                       <td style="text-align:center;">'.$row['species'].'</td>
                    </tr>
                    ';
                  }
                ?>
              </tbody>
          </table>
      </div>
    </div>
    <!-- Animalia -->

  </body>
</html>
