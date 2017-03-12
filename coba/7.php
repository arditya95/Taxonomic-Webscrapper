<?php
// membuat koneksi dengan database
$con = mysqli_connect("localhost","root","","blogspot");

// Langkah 1. Tentukan batas, cek halaman dan posisi data.
$batas = 5;
$halaman = $_GET['halaman'];
if(empty($halaman)){
    $posisi = 0;
    $halaman = 1;
}else{
    $posisi = ($halaman - 1) * $batas;
}

// Langkah 2. Sesuaikan Query dengan posisi dan batas
$paging = mysqli_query($con,"select * from paging limit $posisi,$batas");

echo"<table>
<tr>
 <th>No</th>
 <th>Nama</th>
 <th>Alamat</th>
</tr>";

$no = 1+$posisi;
while($r=mysqli_fetch_array($paging)){
    echo"<tr>
    <td>$no</td>
    <td>$r[nama]</td>
    <td>$r[alamat]</td>
    </tr>";
    $no++;
}
echo"</table>";

// Langkah 3 : Hitung Total data dan halaman serta link 1,2,3..
$paging2 = mysqli_query($con,"select * from paging");
$jmldata = mysqli_num_row($paging2);
$jmlhalaman = ceil($jmldata/$batas);

echo"<br \> Halaman : ";
for($i=1; $i<=$jmlhalaman; $i++){
    if($i != $halaman){
        echo"<a href=\"paging.php?halaman=$i\">$i</a> | ";
    }else{
        echo"<b>$i</b> | ";
    }
}

    echo "<p>Total anggota : <b>$jmldata</b> orang</p>";
?>
