<?php
		include_once '../../../setting/koneksi.php';
    $query=("DELETE FROM tb_ordo WHERE id_ordo='$_GET[id]'");
    $hasil = mysqli_query($con,$query);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
