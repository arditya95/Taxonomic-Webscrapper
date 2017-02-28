<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>coba 3</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>

    <div class="container-fluid">
      <!-- Animalia -->
      <div class="panel panel-primary">
        <div class="panel-heading">
          <label>Kingdom Animalia</label>
        </div>
        <div class="panel-body">
            <table id="example" class="table table-striped table-bordered table-hover">
                <tbody class="table table-striped table-bordered table-hover">
                  <th style="text-align:center;" class="text-uppercase">Phylum</th>
                  <th style="text-align:center;" class="text-uppercase">Class</th>
                  <th style="text-align:center;" class="text-uppercase">Ordo</th>
                  <th style="text-align:center;" class="text-uppercase">Family</th>
                  <th style="text-align:center;" class="text-uppercase">Genus</th>
                  <th style="text-align:center;" class="text-uppercase">Species</th>
                  <?php
                    include 'koneksi.php';
                    $query = "SELECT
                              (SELECT COUNT(tb_kingdom.`id`) FROM tb_kingdom) AS Kingdom,
                              (SELECT COUNT(tb_phylum.`phylum`) FROM tb_phylum)AS Phylum,
                              (SELECT COUNT(tb_class.`class`) FROM tb_class) AS Class,
                              (SELECT COUNT(tb_order.`ordo`) FROM tb_order) AS Ordo,
                              (SELECT COUNT(tb_family.`family`) FROM tb_family) AS Family,
                              (SELECT COUNT(tb_genus.`genus`) FROM tb_genus) AS Genus,
                              (SELECT COUNT(tb_species.`species`) FROM tb_species) AS Species";
                    $result = mysqli_query($con,$query);
                    //BELUM DIPISAH 2 KINGDOMNYA PAKAI SELECT
                    //var_dump($result);
                    while ($row = mysqli_fetch_array($result))
                    {
                      echo '
                      <tr>
                         <td style="text-align:center;">'.$row['Phylum'].'</td>
                         <td style="text-align:center;">'.$row['Class'].'</td>
                         <td style="text-align:center;">'.$row['Ordo'].'</td>
                         <td style="text-align:center;">'.$row['Family'].'</td>
                         <td style="text-align:center;">'.$row['Genus'].'</td>
                         <td style="text-align:center;">'.$row['Species'].'</td>
                      </tr>
                      ';
                    }
                  ?>
                </tbody>
            </table>
        </div>
      </div>
      <!-- Animalia -->
      <!-- Plantae -->
      <div class="panel panel-primary">
        <div class="panel-heading">
          <label>Kingdom Plantae</label>
        </div>
        <div class="panel-body">
            <table id="example" class="table table-striped table-bordered table-hover">
                <tbody class="table table-striped table-bordered table-hover">
                  <th style="text-align:center;" class="text-uppercase">Phylum</th>
                  <th style="text-align:center;" class="text-uppercase">Class</th>
                  <th style="text-align:center;" class="text-uppercase">Ordo</th>
                  <th style="text-align:center;" class="text-uppercase">Family</th>
                  <th style="text-align:center;" class="text-uppercase">Genus</th>
                  <th style="text-align:center;" class="text-uppercase">Species</th>
                </tbody>
            </table>
        </div>
      </div>
      <!-- Plantae -->
    </div>
  </body>
</html>
