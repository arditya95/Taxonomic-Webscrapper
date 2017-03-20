<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AJAX JQ</title>
  </head>
  <body>
    <p>bagian atas</p>
    <div id="box"></div>
    <p>bagian bawah</p>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#box').load('data.php', function(response, status,xhr) {
          if (status==='success') {
            console.log('Berhasill!');
          }else {
            console.log('Gagal');
          }
        });
      });


    </script>
  </body>
</html>
