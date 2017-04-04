<?php
		include '../../../koneksi.php';
    $query=("DELETE FROM tb_class WHERE id_class='$_GET[id]'");
    $hasil = mysqli_query($con,$query);
?>
