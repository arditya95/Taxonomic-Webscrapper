<?php
		include '../../../koneksi.php';
    $query=("DELETE FROM tb_species WHERE id_species='$_GET[id]'");
    $hasil = mysqli_query($con,$query);
?>
