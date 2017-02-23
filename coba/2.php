<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Coba Progress Bar dan footer</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style media="screen">
    .footer{
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1rem;
            background-color: #efefef;
            text-align: center;
          }
    </style>

  </head>

  <body>

    <div id="progress" class = "progress progress-striped active">
       <div id="bar" class = "progress-bar progress-bar-success" role = "progressbar"
       aria-valuenow = "60" aria-valuemin = "0" aria-valuemax = "100" style = "width: 0%;">
          <!-- <span class = "sr-only">40% Complete</span> -->
          <div id="label">
            <!-- 60% Complete -->
          </div>
       </div>
    </div>

<input onclick="move()" type="button" value="Start">

<script type="text/javascript">
function move()
  {
    var elem = document.getElementById("bar");
    var width = 10;
    var id = setInterval(frame, 60);
    function frame()
    {
      if (width >= 100)
        {
            clearInterval(id);
        }
      else
        {
            width++;
            elem.style.width = width + '%';
            document.getElementById("label").innerHTML = width * 1 + '%';
        }
    }
  }
</script>

<div class="footer">
    <p> Copyright &copy; 2017 By I Putu Arditya Darmawan </p>
</div>

  </body>
</html>
