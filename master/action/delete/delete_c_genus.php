<?php
		include_once '../../../setting/koneksi.php';
    $query=("DELETE FROM tb_ciri_genus WHERE id_genus='$_GET[idt]' AND id_ciri='$_GET[idc]'");
    $hasil = mysqli_query($con,$query);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
