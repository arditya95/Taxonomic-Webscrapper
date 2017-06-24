<?php
require("../setting/koneksi.php");
?>

<html>
<head>
<title>Multiple Input</title>
<script src="https://code.jquery.com/jquery-1.6.4.min.js" charset="utf-8"></script>


<script type="text/javascript">
var counter = 0;
$(function(){
  $('p#add_field').click(function(){
      counter += 1;
      $('#container').append(
      '<div>' +
      '<strong>Hobby No. ' + counter + '</strong><br>' +
      '<input id="field_' + counter + '" name="dynfields['+counter+'][test]' + '" type="text"> <br>' +
      '</div>'
    );
  });
  $('p#delete_field').click(function() {
    $('#container div:last').remove();
  })

});
</script>

<body>

<?php
if (isset($_POST['submit_val'])) {
    if ($_POST['dynfields']) {
        foreach ( $_POST['dynfields'] as $key=>$fieldArray ) {
            $keys = array_keys($fieldArray);
            print_r($keys); echo "<br>";
            $values = array_map(array($con, 'real_escape_string'), $fieldArray);
            $query = "INSERT INTO test (".implode(',',$keys).") VALUES ('".implode('\',\'',$values)."')";
            $result = mysqli_query($con,$query);
        }
    }
    echo "<i><h2><strong>" . count($_POST['dynfields']) . "</strong> Hobbies Added</h2></i>";
    mysqli_close($con);
}

?>
<?php if (!isset($_POST['submit_val'])) { ?>
      <h1>Add your Hobbies</h1>
      <form method="post" action="">
        <div id="container">
          <p id="add_field"><a href="#"><span>Click To Add</span></a></p>
          <p id="delete_field"><a href="#"><span>Click To Delete</span></a></p>
        </div>
        <input type="submit" name="submit_val"  value="Submit"  />
      </form>
<?php } ?>

</body>
</html>
