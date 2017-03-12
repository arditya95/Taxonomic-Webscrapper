<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Progress</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <label>Progress</label>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="#" method="post">
          <table id="example" class="table table-striped table-bordered table-hover">
              <tbody class="table table-striped table-bordered table-hover">
                <th style="text-align:center;" class="text-uppercase">Succes</th>
                <th style="text-align:center;" class="text-uppercase">Error</th>
                <th style="text-align:center;" class="text-uppercase">Pending</th>
              </tbody>
          </table>
          <div id="progress" class = "progress progress-striped active">
             <div id="bar" class = "progress-bar progress-bar-success" role = "progressbar"
             aria-valuenow = "60" aria-valuemin = "0" aria-valuemax = "100" style = "width: 0%;">
                <!-- <span class = "sr-only">40% Complete</span> -->
                <div id="label">
                  <!-- 60% Complete -->
                </div>
             </div>
          </div>
          <button type="button" class="btn btn-primary" onclick="move()">Start</button>
        </form>
      </div>
    </div>
  </div>
</div>




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

  </body>
  </html>
