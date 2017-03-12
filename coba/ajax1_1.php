<html>
<head>
<script>
function showUser(str) {
   if (str == "") {
       document.getElementById("txtHint").innerHTML = "";
       return;
   } else {
       if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
       } else {
           // code for IE6, IE5
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               document.getElementById("txtHint").innerHTML = this.responseText;
           }
       };
       xmlhttp.open("GET","ajax1_2.php?q="+str,true);
       xmlhttp.send();
   }
}
</script>
</head>
<body>

<form>
   <?php
    Include "koneksi.php";
    $query=("SELECT * FROM tb_login");
    $hasil = mysqli_query($con,$query);
    $select= '<select name="users" onchange="showUser(this.value)">';
    $select.='<option selected="selected" value="">Select a person:</option>';
    while($row=mysqli_fetch_array($hasil))
      {
           $select.='<option value="'.$row['id'].'">'.$row['username'].'</option>';
      }
    $select.='</select>';
    echo $select;
   ?>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html>
