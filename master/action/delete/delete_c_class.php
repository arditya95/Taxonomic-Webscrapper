<?php
		include_once '../../../setting/koneksi.php';
    $query=("DELETE FROM tb_ciri_class WHERE id_class='$_GET[idt]' AND id_ciri='$_GET[idc]'");
    $hasil = mysqli_query($con,$query);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
