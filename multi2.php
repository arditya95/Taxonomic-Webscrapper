<?php
// include_once '../setting/koneksi.php';
$query = "SELECT * FROM tb_ciri;";
$hasil = mysqli_query($con,$query);
$select= '<select id="select-one" name="select[]" class="form-control">';
$select.='<option selected="selected" value="0">Pilih Ciri</option>';
while($row=mysqli_fetch_array($hasil))
  {
    $select.='<option  value='.$row['id_ciri'].'>'.$row['ciri'].'</option>';
  }
  $select.='</select>';
  $select;
?>


<div id="container">
      <?php echo $select ?>
</div>



<button id="add">Duplicate</button>


<script type="text/javascript">
//Dupe form and append number every id attribute
(function() {

  var count = 0;

  $('#add').click(function() {

      var source = $('div#container:first'),
          clone = source.clone();

      clone.find(':input').attr('id', function(i, val) {
          return val + count;
      });

      clone.insertBefore(this);

      count++;
  });

})();
</script>
