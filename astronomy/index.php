<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles.css">
    <title>Lab 2</title>
  </head>
  <body>
    <!-- <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark static-top">
        <a class="navbar-brand" href="#">Lab 2</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navTabs" aria-controls="navTabs" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navTabs">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="./">Weather <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="./stack.html">Stack Overflow</a>
          </div>
        </div>
      </nav>
    </header> -->

    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Cover</h3>
              <nav class="nav nav-masthead">
                <a class="nav-link active" href="#">Home</a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="#">Contact</a>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">NASA Picture of the Day</h1>
              <div id="weatherResults">
              </div>
              <?php
                date_default_timezone_set('America/New_York');
                $currDate = isset($_GET["date"]) ? date($_GET["date"]) : date("Y-m-d");
                echo "<input type='hidden' id='date' value=$currDate>";
                echo "<input type='button' class='btn btn-info' id='prev' value='Previous'>";
                echo "<input type='button' class='btn btn-info' id='next' value='Next'>";
              ?>   
              <p class="lead">
              <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
               <a href="https://github.com/BYU-CS260-Winter-2018/lab-2-bryantmh">Github Link</a>
            </div>
          </div>

        </div>

      </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script text="type/javascript" src="./script.js"></script>
  </body>
</html>
