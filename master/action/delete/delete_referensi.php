<?php
		include_once '../../../setting/koneksi.php';
    $query=("DELETE FROM tb_referensi WHERE id_referensi='$_GET[id]'");
    $hasil = mysqli_query($con,$query);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
