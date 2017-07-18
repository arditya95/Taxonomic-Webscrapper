<?php
include 'setting\koneksi.php';

if (isset($_POST['submit'])) {
  $qty = $_POST['quantity'];
  if (empty($qty)) {
    $qty=1;
  }
  $sql="SELECT * FROM tb_link WHERE label=0 LIMIT $qty";
  echo "$sql";
  mysqli_query($con,$sql);
  if($sql)
  {
    echo "<br>$qty";
  }else {
    echo "salah";
  }
}
?>
<form action="" method="post">
  <input type="number" name="quantity" min="1" max="100">
  <input type="submit" name="submit"value="SEND">
</form>
