<html lang="en">

<head>

	<title>Taxonomic Data Grabbing</title>

	<?php include 'template/head.php'; ?>

</head>

<body>

	<div id="wrapper">

		<?php include 'template/navbar.php'; ?>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><i class="fa fa-dashboard"></i> Dashboard</h1>
				</div>
			</div>
			<!-- /.row -->
			<form class="form-horizontal" action="action/weboption.php" method="post">
		    <div class="row">
		      <div class="col-md-6">
		        <div class="panel panel-primary">
		          <div class="panel-heading">
		            <label>Pilih Website</label>
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
			<!-- /.row -->
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
			<!-- Plantae -->
		</div>
		<?php include 'template/script.php'; ?>
		<?php include 'template/footer.php'; ?>
	</body>

	</html>
