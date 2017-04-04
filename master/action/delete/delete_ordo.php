<?php
		include '../../../koneksi.php';
    $query=("DELETE FROM tb_ordo WHERE id_ordo='$_GET[id]'");
    $hasil = mysqli_query($con,$query);
?>
