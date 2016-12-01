<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Progress Bar</title>
  </head>
  <body>

    <style media="screen">
    #myProgress {
        position: relative;
        width: 100%;
        height: 30px;
        background-color: grey;
    }
    #myBar {
        position: absolute;
        width: 1%;
        height: 100%;
        background-color: green;
    }
    </style>
    <!-- <progress id="myBar" class="progress progress-success" value="0" max="100"></progress> -->
    <div id="myProgress">
      <div id="myBar"></div>
    </div>

    <script type="text/javascript">
    function move() {
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
        if (width >= 100) {
            clearInterval(id);
        } else {
            width++;
            elem.style.width = width + '%';
        }
    }
}
    </script>

<button type="button" onclick="move()" name="button "></button>
  </body>
</html>
