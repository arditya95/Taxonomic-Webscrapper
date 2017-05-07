<html lang="en">

<head>
	<title>Taxonomic Data Grabbing</title>
	<?php include 'template/head.php'; ?>
	<script>
	function showUser(str) {
	   if (str == "") {
	       document.getElementById("txtHint").innerHTML = "";
	       return;
	   } else {
	       if (window.XMLHttpRequest) {
	           // code for IE7+, Firefox, Chrome, Opera, Safari
	           xmlhttp = new XMLHttpRequest();
	       } else {
	           // code for IE6, IE5
	           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	       }
	       xmlhttp.onreadystatechange = function() {
	           if (this.readyState == 4 && this.status == 200) {
	               document.getElementById("txtHint").innerHTML = this.responseText;
	           }
	       };
	       xmlhttp.open("GET","ajax_web.php?q="+str,true);
	       xmlhttp.send();
	   }
	}
	</script>
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
			<!-- Pilih Website -->
				<div class="row">
					<!-- KOLOM 1 -->
		      <div class="col-md-6">
		        <div class="panel panel-primary">
		          <div class="panel-heading">
		            <label>Pilih Website</label>
		          </div>
		            <div class="panel-body">
									<form class="form-horizontal" action="#" method="post">
			              <table class="table table-striped table-bordered">
			                <?php
			                  Include "koneksi.php";
			                  $query=("SELECT id, nama FROM tb_web");
			                  $hasil = mysqli_query($con,$query);
			                  $select= '<select name="website" class="form-control" onchange="showUser(this.value)">';
			                  while($row=mysqli_fetch_array($hasil))
			                    {
			                        $select.='<option selected="selected" value="'.$row['id'].'">'.$row['nama'].'</option>';
			                    }
			                  $select.='</select>';
			                  echo $select;
			                ?>
											<div id="txtHint"></div>
			              </table>
										<a href="get_link.php" class="btn btn-primary" role="button">Proses Get Link</a>
										<a href="get_fact.php" class="btn btn-primary" role="button">Proses Get Fact</a>
										<a href="filter.php" class="btn btn-primary" role="button">Proses Filtering</a>
									</form>
		            </div>
		        </div>
		      </div>
					<!-- /KOLOM 1 -->

					<!-- KOLOM 2 -->
					  <!-- <div class="col-lg-6">
					    <div class="panel panel-primary">
					      <div class="panel-heading">
					        <label>Progress</label>
					      </div>
					      <div class="panel-body">
					        <form class="form-horizontal" action="#" method="post">
					          <table id="example" class="table table-striped table-bordered table-hover">
					              <tbody class="table table-striped table-bordered table-hover">
					                <th style="text-align:center;" class="text-uppercase">Success</th>
					                <th style="text-align:center;" class="text-uppercase">Error</th>
					                <th style="text-align:center;" class="text-uppercase">Pending</th>
					              </tbody>
					          </table>
					          <div id="progress" class = "progress progress-striped active">
					             <div id="bar" class = "progress-bar progress-bar-success" role = "progressbar"
					             aria-valuenow = "60" aria-valuemin = "0" aria-valuemax = "100" style = "width: 0%;">
					                <span class = "sr-only">40% Complete</span>
					                <div id="label">
					                  60% Complete
					                </div>
					             </div>
					          </div>
<button type="button" class="btn btn-primary" onclick="move()">Start</button>
					        </form>
					      </div>
					    </div>
					  </div> -->
			<!-- /KOLOM 2 -->

			<!-- /Pilih Website -->
			<!-- Animalia -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<label>Kingdom Animalia</label>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" action="#" method="post">
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
		                              (SELECT COUNT(DISTINCT tb_kingdom.`nama_kingdom`) FROM tb_kingdom WHERE id_kingdom !=1) AS Kingdom,
		                              (SELECT COUNT(DISTINCT tb_phylum.`nama_phylum`) FROM tb_phylum WHERE id_phylum !=1)AS Phylum,
		                              (SELECT COUNT(DISTINCT tb_class.`nama_class`) FROM tb_class WHERE id_class !=1) AS Class,
		                              (SELECT COUNT(DISTINCT tb_ordo.`nama_ordo`) FROM tb_ordo WHERE id_ordo !=1) AS Ordo,
		                              (SELECT COUNT(DISTINCT tb_family.`nama_family`) FROM tb_family WHERE id_family !=1) AS Family,
		                              (SELECT COUNT(DISTINCT tb_genus.`nama_genus`) FROM tb_genus WHERE id_genus !=1) AS Genus,
		                              (SELECT COUNT(DISTINCT tb_species.`nama_species`) FROM tb_species WHERE id_species !=1) AS Species";
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
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Animalia -->

		</div>
</div>
</div>

		<script type="text/javascript">
		function move()
		  {
		    var elem = document.getElementById("bar");
		    var width = 10;
		    var id = setInterval(frame, 60);
		    function frame()
		    {
		      if (width >= 100)
		        {
		            clearInterval(id);
		        }
		      else
		        {
		            width++;
		            elem.style.width = width + '%';
		            document.getElementById("label").innerHTML = width * 1 + '%';
		        }
		    }
		  }
		</script>
		<?php include 'template/script.php'; ?>
		<?php include 'template/footer.php'; ?>
	</body>
</html>
