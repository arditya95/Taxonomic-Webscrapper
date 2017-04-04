<?php
		include '../../../koneksi.php';
    $query=("DELETE FROM tb_kingdom WHERE id_kingdom='$_GET[id]'");
    $hasil = mysqli_query($con,$query);
?>
