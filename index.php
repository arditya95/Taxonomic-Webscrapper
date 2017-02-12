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
		  </body>
		</div>


		<?php include 'template/script.php'; ?>
	</body>

	</html>
