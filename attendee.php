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
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <img src="./assets/pics/NHCCS_logo_hi-res.gif" height="200" width="300">
      </div>
      <ul class="nav navbar-nav">
        <li><a href="home.php">HOME</a></li>
        <li><a href="addSeminar.php">Add Seminar</a></li>
        <li class="active"><a href="attendee.php">Attendee</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="col-md-10">
      <div class="col-md-4">
        <div class="lead" id="displayA">List of Attendees</div>
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
      <div class="col-md-6">
        <div class="lead" id="displayS">List of Seminars</div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  </body>
</html>