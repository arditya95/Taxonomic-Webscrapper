<div class="panel panel-default">
  <div class="panel-heading">Dynamic Form Fields - Add & Remove Multiple fields</div>
  <div class="panel-heading">Education Experience</div>
  <div class="panel-body">
    <?php
    // include_once '../setting/koneksi.php';
    $query = "SELECT * FROM tb_ciri;";
    $hasil = mysqli_query($con,$query);
    $select= '<select name="select[]" class="form-control">';
    $select.='<option selected="selected" value="0">Pilih Ciri</option>';
    while($row=mysqli_fetch_array($hasil))
      {
        $select.='<option  value='.$row['id_ciri'].'>'.$row['ciri'].'</option>';
      }
      $select.='</select>';
      $select;
    ?>
  <div id="education_fields">

        </div>
       <div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Schoolname" name="Schoolname[]" value="" placeholder="School name">
  </div>
</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Major" name="Major[]" value="" placeholder="Major">
  </div>
</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Degree" name="Degree[]" value="" placeholder="Degree">
  </div>
</div>

<div class="col-sm-3 nopadding">
  <div class="form-group">
    <div class="input-group">
      <?php echo $select ?>
      <div class="input-group-btn">
        <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      </div>
    </div>
  </div>
</div>
<div class="clear"></div>

  </div>
  <div class="panel-footer"><small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>, <small>Press <span class="glyphicon glyphicon-minus gs"></span> to remove form field :)</small></div>
  <div class="panel-footer"><small><em><a href="http://shafi.info/">More Info - Developer Shafi (Bangladesh)</a></em></em></small></div>
</div>

<script type="text/javascript">
var room = 1;
function education_fields() {

  room++;
  var objTo = document.getElementById('education_fields')
  var divtest = document.createElement("div");
divtest.setAttribute("class", "form-group removeclass"+room);
var rdiv = 'removeclass'+room;
  divtest.innerHTML = '<div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="Schoolname" name="Schoolname[]" value="" placeholder="School name"></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="Major" name="Major[]" value="" placeholder="Major"></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" id="Degree" name="Degree[]" value="" placeholder="Degree"></div></div><div class="col-sm-3 nopadding"><div class="form-group"><div class="input-group"> <select class="form-control" id="educationDate" name="educationDate[]"><?php if(count($hasil)){foreach($hasil as $row){echo"<option value=".$row['id_ciri'].'>'.$row['ciri']."</option>";}}?></select><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';

  objTo.appendChild(divtest)
}
 function remove_education_fields(rid) {
   $('.removeclass'+rid).remove();
 }
</script>
