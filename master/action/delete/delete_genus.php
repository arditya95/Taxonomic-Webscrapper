<?php
		include '../../../koneksi.php';
    $query=("DELETE FROM tb_genus WHERE id_genus='$_GET[id]'");
    $hasil = mysqli_query($con,$query);
		header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
