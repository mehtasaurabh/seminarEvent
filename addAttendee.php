<?php
/*
*	File    : Index.php
*	Purpose : Contains all html data and Php data for the login page
*	Author  : Saurabh Mehta
*/
if (isset($_GET['event_id'])) {
    $id = $_GET['event_id'];
   

if(isset($_POST['name']) && isset($_POST['contact']))
  {
    // include Database connection file 
    include("./config/config.php");

    // get values 
    $name = $_POST['name'];
    $contact = $_POST['contact'];

	   
    $db->addAttendee('attendee', $name, $contact, $id);
  }
}
 $PageTitle = "addAttendee.php";
 include_once 'header.php';
?>

  <body background="./assets/pics/a.jpg">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <img src="./assets/pics/NHCCS_logo_hi-res.gif" height="200" width="300">
        </div>
        <ul class="nav nav-pills">
          <li><a href="home.php">HOME</a></li>
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
          	<span style="color:green"><?php if(isset($msg)) echo $msg; ?></span>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>


