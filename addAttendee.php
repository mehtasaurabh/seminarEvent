<?php
/*	File    : Index.php
	Purpose : Contains all html data and Php data for the login page
	Author  : Saurabh Mehta	*/
  if(isset($_POST['submit'])) {
    $error = false;
  	include_once "dbconnect.php";

  	$name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $contact = trim($_POST['contact']);
    $contact = strip_tags($contact);
    $contact = htmlspecialchars($contact);

    if(!$error){
    
      $record = $fm->createRecord('attendee');

      $record->setField('name', $name);
      $record->setField('contact', $contact);
      
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

 	$PageTitle = "addAttendee.php";
 	include_once 'header.php';
?>

  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <img src="NHCCS_logo_hi-res.gif" height="200" width="300">
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="home.php">HOME</a></li>
        </ul>
      </div>
    </nav>
    <div class="container">
	  <form action="" class="form-horizontal container" name="addSeminar" method="post" id="addsem">
	    <div class="container-fluid form-group">
	      <div class="col-sm-10">
	        <label class="control-label col-sm-4">Name:</label>
            <div class="col-sm-6">
              <input type="text" id="name" name="name" class="form-control" placeholder="Name" /><br>
	        </div>
	        <label class="control-label col-sm-4">Contact:</label>
            <div class="col-sm-6">
              <input type="number" id="contact" name="contact" class="form-control" placeholder="Contact no." /><br>
	        </div>
	        <div class="form-style">
              <div class="row">
                <div class="col-md-6">
                  <center>
                    <input type='submit' class="btn btn-lg btn btn-success" name='submit' value='Interested' />
                  </center>
                </div>
              </div>
            </div>
          </div><br>
          <div >
          	<span style="color:red"><?php if(isset($msg)) echo $msg; ?></span>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>


