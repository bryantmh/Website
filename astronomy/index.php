<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles.css">
    <title>Astronomy</title>
  </head>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">NASA Image of the Day</h3>
              <nav class="nav nav-masthead">
                <a class="nav-link active" href="./">Home</a>
                <a class="nav-link" href="https://github.com/bryantmh/Website/tree/master/astronomy">GitHub</a>
              </nav>
            </div>
          </div>
          <div class="inner cover">
            <?php
              date_default_timezone_set('America/New_York');
              $currDate = isset($_GET["date"]) ? date($_GET["date"]) : date("Y-m-d");
              echo "<input type='hidden' id='date' value=$currDate>";
            ?>
            <iframe id="video" type="text/html" style="position:fixed; left:0px; bottom:0px; width:100%; height:100%;" frameborder="0"></iframe>
          </div>
          <div id="info" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="infoHeader"></h4>
                </div>
                <div class="modal-body">
                  <p id="infoBody"></p>
                  <p id="infoCopyright"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <input type='button' class='btn btn-info' id='prev' value='Previous'>
              <input type='button' class="btn btn-lg btn-secondary" style="margin-left: 1%; margin-right: 1%;" value="About" data-toggle="modal" data-target="#info">
              <input type='button' class='btn btn-info' id='next' value='&nbsp;&nbsp;Next&nbsp;&nbsp;'">
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./jquery-dateFormat.min.js"></script>
    <script text="type/javascript" src="./script.js"></script>
  </body>
</html>
