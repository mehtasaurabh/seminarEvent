<?php
/*	
*    File    : Index.php
*		Purpose : Contains all html data and Php data for the login page
*		Author  : Saurabh Mehta	
*/
  // to connect the database
  include("./config/config.php");
  $PageTitle = "attendee.php";
  include_once 'header.php';
?>

  <body background="./assets/pics/a.jpg">
    <!--creating navbar-->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>     
          </button>
          <img src="./assets/pics/NHCCS_logo_hi-res.gif" height="100" width="200">
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">Home</a></li>
            <li><a href="addSeminar.php">Add Seminar</a></li>
            <li><a href="addAttendee.php">Attendee</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="col-sm-10">
        <div class="col-sm-4">
          <div class="lead" id="displayA">
            List of Attendees
          </div>
          <div class="table-responsive">
            <!--creating table to display attendees details-->
            <table  class="table-striped table-bordered table-hover table-condensed">
              <tr>
                <th>Name</th>
                <th>Contact</th>
              </tr>
              
              <?php
                //calling attendee function to display complete list of attendees
                $records = $db->completeAttendees('attendee');
                if($records) {
                  foreach ($records as $record) { 
                    echo "<tr>";
                    echo "<td>".$record->getField('name'). "</td>";
                    echo "<td>".$record->getField('contact'). "</td>";
                    echo "</tr>";
                    }
                  }
              ?>
            </table>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="lead" id="displayS">List of Seminars</div>
            <div class="table-responsive">
              <!--creating tables to display seminar details-->
              <table  class="table-striped table-bordered table-hover table-condensed">
                <tr>
                  <th>Title</th>
                  <th>PresentedBy</th>
                  <th>Subscribe</th>
                </tr>
                <?php 
                  //calling seminar function to display list of seminars 
                  $records = $db->showSeminar('semiEvent');
                  if($records) {
                    foreach ($records as $record) { 
                      echo "<tr>";
                      echo "<td>".$record->getField('title'). "</td>";
                      echo "<td>".$record->getField('presentedBy'). "</td>";
                      echo "<td><a href=\"addAttendee.php?event_id=".$record->getField('event_id')."\">Subscribe</a></td>";
                      echo "</tr>";
                    }
                  }
                ?> 
              </table>   
            </div>
          </div>
        </div>
      </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  </body>
</html>