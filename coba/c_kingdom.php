<html>
      <head>
           <title>Dynamically Add or Remove input fields in PHP with JQuery</title>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      </head>
      <body>
             <div class="container">
                <br />
                <br />
                <h2 align="center">Dynamically Add or Remove input fields in PHP with JQuery</h2>
                <div class="form-group">
                     <form name="add_name" id="add_name">
                          <div class="table-responsive">
                               <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                         <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
                                         <?php
                                         include_once '../setting/koneksi.php';
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
                                         <td><?php echo $select; ?></td>
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                    </tr>
                               </table>
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                          </div>
                     </form>
                </div>
           </div>
      </body>
 </html>
 <script>
 $(document).ready(function(){
      var i=1;
      $('#add').click(function(){
           i++;
           var html = '<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list"/></td><th><select class="form-control" name="select[]"><?php if(count($hasil)){ foreach ($hasil as $row){ echo "<option value=".$row['id_ciri'].'>'.$row['ciri']."</option>"; }}?></th><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>';
           $('#dynamic_field').append(html);
      });
      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });
      $('#submit').click(function(){
           $.ajax({
                url:"ciri_ajax.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                     alert(data);
                     $('#add_name')[0].reset();
                }
           });
      });
 });
 </script>
