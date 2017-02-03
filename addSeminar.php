<?php
	/*	File    : addSeminar.php
		  Purpose : Contains all html data and Php data to add seminars
		  Author  : Saurabh Mehta	*/
    
  if(isset($_POST['submit'])) {
    $error = false;
    include_once 'dbconnect.php';

    $title = trim($_POST['title']);
    $title = strip_tags($title);
    $title = htmlspecialchars($title);

    $presentedBy = trim($_POST['presentedBy']);
    $presentedBy = strip_tags($presentedBy);
    $presentedBy = htmlspecialchars($presentedBy);

    $date = trim($_POST['date']);
    $date = strip_tags($date);
    $date = htmlspecialchars($date);

    $time = trim($_POST['time']);
    $time = strip_tags($time);
    $time = htmlspecialchars($time);

    if(!$error){
    
      $record = $fm->createRecord('semiEvent');

      $record->setField('title', $title);
      $record->setField('presentedBy', $presentedBy);
      $record->setField('date', $date);
      $record->setField('time', $time);
      
      $result = $record->commit();
      
      if(!empty($result)) {
        $msg = "SUCCESSFUL REGISTERATION";
      } else {
        $msg = "Problem in Registeration";
      }
    } else {
        echo "error";
    }
  }

  $PageTitle = "addSeminar.php";
  include_once 'header.php';
?>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <img src="NHCCS_logo_hi-res.gif" height="200" width="300">
      </div>
      <ul class="nav navbar-nav">
        <li><a href="Presentation.php">Presentation</a></li>
        <li class="active"><a href="addSeminar.php">Add Seminar</a></li>
        <li><a href="attendee.php">Attendee</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <button type="button" class="btn btn-info navbar-btn" data-toggle="modal" data-target="#info">About Us</button>
      </ul>
    </div>
  </nav>
  <div class="container">
    <form action="" class="form-horizontal container" name="addSeminar" method="post" id="addsem">
      <div class="container-fluid form-group">
        <div class="col-sm-10">
          <label class="control-label col-sm-4">Title:</label>
            <div class="col-sm-6">
              <input type="text" id="title" name="title" class="form-control" placeholder="Seminar Title"/><br>
            </div>
            <label class="control-label col-sm-4">PresentedBy::</label>
            <div class="col-sm-6">
              <input type="text" id="presentedBy" name="presentedBy" class="form-control" placeholder="Orator of Seminar"/><br>
            </div>
            <label class="control-label col-sm-4">Date:</label>
            <div class="col-sm-6">
              <input type="Date" id="date" name="date" class="form-control"/><br>
            </div>
            <label class="control-label col-sm-4">Time:</label>
            <div class="col-sm-6">
              <input type="Time" id="time" name="time" class="form-control"/><br>
            </div>
            <div class="form-style">
              <div class="row">
                <div class="col-md-6">
                  <center>
                    <input type='submit' class="btn btn-lg btn btn-success" name='submit' value='Register' />
                  </center>
                </div>
              </div>
            </div>
            <div >
              <span style="color:red"><?php if(isset($msg)) echo $msg; ?></span>
            </div>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>





















