<head>
	<title>Taxonomic Data Grabbing</title>
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
          <label>Get Link</label>
        </div>
          <div class="panel-body">
						<form class="form-horizontal" action="app\scrap\get_link_all.php" method="post">
              <table class="table table-striped table-bordered">
                <?php
                  $query=("SELECT id_referensi, link FROM tb_referensi");
                  $hasil = mysqli_query($con,$query);
                  $select= '<select name="website" class="form-control" onchange="showUser(this.value)">';
                  while($row=mysqli_fetch_array($hasil))
                    {
												$url=$row['link'];
												$host= parse_url($url, PHP_URL_HOST);
                        $select.='<option selected="selected" value="'.$row['id_referensi'].'">'.$host.'</option>';
                    }
                  $select.='</select>';
                  echo $select;
                ?>
								<div id="txtHint"></div>
              </table>
							<input class="btn btn-primary" type="submit" name="submit" value="Proses Get Link">
							<!-- <a href="app/scrap/get_link.php" class="btn btn-primary" role="button">Proses Get Link</a> -->
							</form>
							<!-- <a href="app/scrap/get_fact.php" class="btn btn-primary" role="button">Proses Get Fact</a> -->
							<!-- <form class="" action="index.html" method="post">
								<a href="app/scrap/filter.php" class="btn btn-primary" role="button">Proses Filtering</a>
							</form> -->
          </div>
      </div>
			<div class="panel panel-primary">
        <div class="panel-heading">
          <label>Get Content & Filter</label>
        </div>
          <div class="panel-body">
						<form action="app\scrap\get_fact_all.php" method="post">
							<label for="quantity">Input Jumlah Link</label>
							<input type="number" class"form-control" name="quantity" min="1" max="100">
							<input class="btn btn-primary" type="submit" name="submit" value="Proses Get Fact">
						</form>
						<br>
						<table id="example" class="table table-striped table-bordered table-hover">
								<tbody class="table table-striped table-bordered table-hover">
									<th style="text-align:center;" class="text-uppercase">Link Checked</th>
									<th style="text-align:center;" class="text-uppercase">Link Uncheked</th>
									<?php
	                  $query = "SELECT (SELECT COUNT(*) FROM tb_link WHERE label=1) AS cek,
															(SELECT COUNT(*) FROM tb_link WHERE label=0) AS uncek";
	                  $result = mysqli_query($con,$query);
	                  //var_dump($result);
	                  while ($row = mysqli_fetch_array($result))
	                  {
	                    echo '
	                    <tr>
	                       <td style="text-align:center;">'.$row['cek'].'</td>
	                       <td style="text-align:center;">'.$row['uncek'].'</td>
	                    </tr>
	                    ';
	                  }
	                ?>
								</tbody>
						</table>
					</div>
      </div>
    </div>
		<!-- /KOLOM 1 -->

		<!-- KOLOM 3 -->
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <label>Backup Database</label>
        </div>
          <div class="panel-body">
						<a href="app/backup/export.php" class="btn btn-lg btn-block btn-primary" role="button"><i class="fa fa-cloud-upload"></i> Export</a>
						<a href="route.php?d=master/data&p=export" class="btn btn-lg btn-block btn-primary" role="button"><i class="fa fa-cloud-download"></i> Import</a>
					</div>
      </div>
			<div class="panel panel-primary">
        <div class="panel-heading">
          <label>Clear Data</label>
        </div>
          <div class="panel-body">
						<a href="app\clear\truncate_tb_link.php" class="btn btn-lg btn-block btn-primary" role="button"><i class="fa fa-eraser"></i> Clear Link</a>
						<a href="app\clear\truncate_all_tb.php" class="btn btn-lg btn-block btn-primary" role="button"><i class="fa fa-eraser"></i> Clear All</a>
					</div>
      </div>
    </div>
		<!-- /KOLOM 3 -->
<!-- Animalia -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<label>Data Collection</label>
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
                  $query = "SELECT
                            (SELECT COUNT(DISTINCT tb_kingdom.`nama_kingdom`) FROM tb_kingdom) AS Kingdom,
                            (SELECT COUNT(DISTINCT tb_phylum.`nama_phylum`) FROM tb_phylum) AS Phylum,
                            (SELECT COUNT(DISTINCT tb_class.`nama_class`) FROM tb_class) AS Class,
                            (SELECT COUNT(DISTINCT tb_ordo.`nama_ordo`) FROM tb_ordo) AS Ordo,
                            (SELECT COUNT(DISTINCT tb_family.`nama_family`) FROM tb_family) AS Family,
                            (SELECT COUNT(DISTINCT tb_genus.`nama_genus`) FROM tb_genus) AS Genus,
                            (SELECT COUNT(DISTINCT tb_species.`nama_species`) FROM tb_species) AS Species";
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
