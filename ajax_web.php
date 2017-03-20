<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
include 'koneksi.php';

$q = intval($_GET['q']);

$sql="SELECT * FROM tb_web WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo "<b>" . $row['nama'] . " telah di pilih" . "</b>" ;
    $sqlup="UPDATE tb_web SET label=0 WHERE id!=$row[id]";
    $sqlup2="UPDATE tb_web SET label=1 WHERE id=$row[id]";

    $hasilup = mysqli_query($con,$sqlup);
    $hasilup2 = mysqli_query($con,$sqlup2);
    //var_dump($sqlup);
}
mysqli_close($con);
?>
</body>
</html>
