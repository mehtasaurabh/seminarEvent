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
      <ul class="nav navbar-nav">
        <li><a href="home.php">HOME</a></li>
        <li><a href="addSeminar.php">Add Seminar</a></li>
        <li><a href="attendee.php">Attendee</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading lead" id="panel-heading">New Attendee</div>  
        <div class="panel-body">
          <!--creating form to add new attendees-->    
	         <form action="" class="form-horizontal container" name="addAttendee" method="post" id="addAttendee">
	           <div class="container-fluid form-group">  
                <div class="col-sm-10">
                  <label class="control-label col-sm-4">Name:</label>
                  <div class="col-sm-6">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" />
                    <div class="error_form" id="nameErr"></div><br>
                  </div>
                  <label class="control-label col-sm-4">Contact:</label>
                  <div class="col-sm-6">
                    <input type="number" id="contact" name="contact" class="form-control" placeholder="Contact no." />
                    <div class="error_form" id="contactErr"></div><br>
                  </div>
                  <div class="form-style">
                    <div class="row">
                      <div class="col-sm-6">
                        <center>
                          <input type='submit' class="btn btn-lg btn btn-success" name='submit' value='Interested' />
                        </center>
                      </div>
                    </div>
                  </div>
                </div>
              <br>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/attendeeValidate.js"></script>
  </body>
</html>


