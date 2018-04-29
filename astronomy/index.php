<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
  <link rel="stylesheet" href="../templateStyles.css">
  <link rel="stylesheet" href="./common/styles.css">
  <title>Astronomy</title>
</head>

<body>
  <main role="main">
    <?php
    date_default_timezone_set('America/New_York');
    $currDate = isset($_GET["date"]) ? date($_GET["date"]) : date("Y-m-d");
    echo "<input type='hidden' id='date' value=$currDate>";
    ?>
    <iframe id="video" type="text/html" style="position:fixed; left:0px;width:100%; height:93.3%;" frameborder="0"></iframe>
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
  </main>

  <footer class="footer">
    <div class="container" style="margin-top: 10px; max-width: 100%;">
     <button type='button' class='btn btn-info' id='home' style="float: left; margin-left: 5px; margin-top: 7px; height: 50px;" onclick="location.href = '../';">
      <i class="fas fa-home fa-2x"></i>
     </button>
     <button type='button' class='btn btn-info' id='prev' style="margin-left: -50px; height: 50px;">
      <i class="fa fa-arrow-left fa-2x"></i>
     </button>
     <button type='button' class="btn btn-lg btn-secondary" style="margin-left: 10px; margin-right: 10px; height: 50px;" data-toggle="modal" data-target="#info">
      <i class="fas fa-info" style="color: black;"></i>
     </button>
     <button type='button' class='btn btn-info' id='next' style="height: 50px;">
      <i class="fa fa-2x fa-arrow-right"></i>
     </button>
    </div>
  </footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="./common/jquery-dateFormat.min.js"></script>
<script text="type/javascript" src="./common/script.js"></script>
</body>
</html>
