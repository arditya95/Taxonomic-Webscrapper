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
				<div class="col-md-12">
					<h2 class="text-center">== TAXONOMIC DATA GRABBING =</h2>
					<h3 class="text-center">== I PUTU ARDITYA DARMAWAN (1304505006) ==</h3>
				</div>
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<label>MAIN MENU</label>
						</div>
						<div class="panel-body">
							<table class="table table-striped table-bordered">
                <tr><td><a href="get_link.php">All Animals</a></td></tr>
								<tr><td><a href="get_fact.php">Fact Animals</a></td></tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<button id="export_btn" onclick="goExport()" class="btn btn-lg btn-block btn-primary"><i class="fa fa-cloud-upload"></i> MANUAL EXPORT</button>
					<button id="import_btn" onclick="goImport()" class="btn btn-lg btn-block btn-primary"><i class="fa fa-cloud-download"></i> MANUAL IMPORT</button>
				</div>
			</div>
		</div>


		<?php include 'template/script.php'; ?>
	</body>

	</html>
