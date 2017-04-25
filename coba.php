<!DOCTYPE html>
<html>
  <head>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    echo "<a href='index.php' onClick=\"return
    confirm('are you sure you want to delete??');\"><center>Delete</center></a>";
     ?>

     <a href="deletelink" class="delete">Delete</a>
  </body>
</html>
