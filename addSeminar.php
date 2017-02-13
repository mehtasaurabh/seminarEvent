<?php
/*  File    : addSeminar.php
*   Purpose : Contains all html data and Php data to add seminars
*   Author  : Saurabh Mehta 
*/ 
  
if(isset($_POST['title']) && isset($_POST['presentedBy']) && isset($_POST['date']) && isset($_POST['time'])) {
    // include Database connection file 
    include("./config/config.php");
    // get values 
    $title = $_POST['title'];
    $presentedBy = $_POST['presentedBy'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $db->addSeminar('semiEvent', $title, $presentedBy, $date, $time);
  }
    
  $pageTitle = "addSeminar.php";
  include_once 'header.php';
  ?>
<body background="./assets/pics/a.jpg">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <img src="./assets/pics/NHCCS_logo_hi-res.gif" height="200" width="300">
      </div>
      <ul class="nav navbar-nav">
        <li><a href="home.php">HOME</a></li>
        <li class="active"><a href="addSeminar.php">Add Seminar</a></li>
        <li><a href="attendee.php">Attendee</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading lead" id="panel-heading">New Seminar</div>  
        <div class="panel-body">
          <!--creating form to add new seminars-->
          <form action="" class="form-horizontal container" method="post" id="addSeminar">
            <div class="container-fluid form-group">
              <div class="col-sm-10">
                <label class="control-label col-sm-4">Title:</label>
                <div class="col-sm-6">
                  <input type="text" id="title" name="title" class="form-control" placeholder="Seminar Title"/>
                  <div class="error_form" id="titleErr"></div><br>
                </div>
                <label class="control-label col-sm-4">PresentedBy:</label>
                <div class="col-sm-6">
                  <input type="text" id="presentedBy" name="presentedBy" class="form-control" placeholder="Orator of Seminar"/>
                  <div class="error_form" id="presentedByErr"></div><br>
                </div>
                <label class="control-label col-sm-4">Date:</label>
                <div class="col-sm-6">
                  <input type="Date" id="date" name="date" class="form-control" required /><br>
                  <div class="error_form" id="dateErr"></div>
                </div>
                <label class="control-label col-sm-4">Time:</label>
                <div class="col-sm-6">
                  <input type="Time" id="time" name="time" class="form-control" required /><br>
                  <div class="error_form" id="timeErr"></div>
                </div>
                <div class="form-style">
                  <div class="row">
                    <div class="col-sm-6">
                      <center>
                        <input type='submit' class="btn btn-lg btn btn-success" name='submit' value='Register Seminar'/>
                      </center>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/seminarvalidate.js"></script> 
  </body>
</html>
