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
          <label>Pilih Website</label>
        </div>
          <div class="panel-body">
						<form class="form-horizontal" action="#" method="post">
              <table class="table table-striped table-bordered">
                <?php
                  $query=("SELECT id_referensi, link FROM tb_referensi");
                  $hasil = mysqli_query($con,$query);
                  $select= '<select name="website" class="form-control" onchange="showUser(this.value)">';
                  while($row=mysqli_fetch_array($hasil))
                    {
                        $select.='<option selected="selected" value="'.$row['id_referensi'].'">'.$row['link'].'</option>';
                    }
                  $select.='</select>';
                  echo $select;
                ?>
								<div id="txtHint"></div>
              </table>
							<a href="app/scrap/get_link.php" class="btn btn-primary" role="button">Proses Get Link</a>
							<a href="app/scrap/get_fact.php" class="btn btn-primary" role="button">Proses Get Fact</a>
							<a href="app/scrap/filter.php" class="btn btn-primary" role="button">Proses Filtering</a>
						</form>
          </div>
      </div>
    </div>
		<!-- /KOLOM 1 -->
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
