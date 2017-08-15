<?php
include_once '../../../setting/koneksi.php';
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $indonesia = $_POST['indonesia'];
  $inggris = $_POST['inggris'];
  $deskripsi = $_POST['deskripsi'];
  $golongan = $_POST['golongan'];
  $id = $_POST['id'];

  $sql="UPDATE tb_species SET nama_species = '$nama', nama_indonesia = '$indonesia',
  nama_english = '$inggris', deskripsi_species = '$deskripsi', id_genus = '$golongan' WHERE id_species = '$id';";
  mysqli_query($con,$sql);

  // TODO: Upload gambar
    // print_r($_FILES);
    $time=time();
    $nama_gambar=$_FILES['gambar']['name'];
    $error_gambar=$_FILES['gambar']['error'];
    $size_gambar=$_FILES['gambar']['size'];
    $asal_gambar=$_FILES['gambar']['tmp_name'];
    $ext = pathinfo($nama_gambar, PATHINFO_EXTENSION);
    // $asal_type=$_FILES['gambar']['type'];
    $nama_file= "../../../img/$nama_gambar";
    // if (file_exists($nama_file)) {
      $nama_file=str_replace(".$ext", "", $nama_file);
      $nama_file= $nama_file. "_". $time .".". $ext;
      move_uploaded_file($asal_gambar, $nama_file);
      $get_nama_file=str_replace(".$ext", "", $nama_gambar). "_". $time .".". $ext;
      $lokasi_simpan="img/$get_nama_file";
      // die($lokasi_simpan);
      $sql2="UPDATE tb_gambar_species SET gambar_species = '$lokasi_simpan' WHERE id_species = '$id'";
      // echo "$sql2";
      mysqli_query($con,$sql2);
    // }
  //
  if($sql || $sql2)
  {
    echo "<script language=javascript>
    alert('Data Berhasil Disimpan');
    location.href='../../../route.php?kode=data_species';</script>";
  }
  else
  {
    echo"<script language=javascript> alert ('Gagal Tambah Data');history.back();</script>";
  }
}
// header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
