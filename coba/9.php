<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajax</title>
  </head>
  <body>
    <div id="box"></div>
    <input type="text" id="text" value="">
    <button type="button" id="button">Click Me !!</button>

    <script type="text/javascript">
    function load_ajax(url, callback) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = cekStatus;

        function cekStatus(){
            if (xhr.readyState == 4 && xhr.status == 200) {
                callback(xhr.responseText);
           }
        }
        xhr.open("GET", url, true);
        xhr.send();
    }

    document.getElementById('button').onclick = function() {

      text = document.getElementById('text').value;

      load_ajax('data.php?q=' + text, function(data){
          console.log(data);
          document.getElementById('box').innerHTML = data;
      });
    }


    </script>
  </body>
</html>
