<!-- HALAMAN INDEX SEBAGAI HALAMAN UTAMA EXPORT DAN IMPORT MANUAL-->
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HOMEPAGE MODUL1</title>

    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <link href="../dist/css/timeline.css" rel="stylesheet">

    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<script>
	function goExport(){
		document.getElementById("export_btn").innerHTML="Exporting, please wait...";
		window.location="export_csv.php";
	}
	function goImport(){
		document.getElementById("import_btn").innerHTML="Importing, please wait...";
		window.location="import_csv.php";
	}
	</script>
</head>
<body>


<div id="wrapper">

		<?php include '../template/navbar.php'; ?>

        <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
            <!-- /.row -->
            <div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1 class="text-center">== KELOMPOK 15 ==</h1>
			<h3 class="text-center">== MODUL 1 ==</h3>

			<div class="panel panel-primary">
				<div class="panel-heading">
					Anggota Kelompok 15
				</div>
				<div class="panel-body">
					<table class="table table-striped table-bordered">
						<tr><td>1304505006 - I Putu Arditya Darmawan</td></tr>
						<tr><td>1304505061 - I Wayan Eka Yuliana</td></tr>
						<tr><td>1304505064 - Ahmad Afifi</td></tr>
						<tr><td>1304505083 - Sang Gde Aditya Bhaskara</td></tr>
						<tr><td>1304505102 - Ni Luh Adriani</td></tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-3">
			<a href="databuku.php"><button class="btn btn-lg btn-block btn-default">DATA BUKU</button></a>
		</div>
		<div class="col-md-3">
			<a href="datapenerbit.php"><button class="btn btn-lg btn-block btn-default">DATA PENERBIT</button></a>
		</div>
	</div>
	<div style="clear:both;margin-top:10px;"></div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-3">
			<button id="export_btn" onclick="goExport()" class="btn btn-lg btn-block btn-primary">MANUAL EXPORT</button>
		</div>
		<div class="col-md-3">
			<button id="import_btn" onclick="goImport()" class="btn btn-lg btn-block btn-primary">MANUAL IMPORT</button>
		</div>
	</div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>	



		
        

</body>