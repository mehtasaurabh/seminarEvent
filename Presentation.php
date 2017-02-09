<?php
/*	File    : View.php
*		Purpose : views the details of respective seminar
*		Author  : Saurabh Mehta	
*/
  // to connect the database
  include("./config/config.php");
  $PageTitle = "presentation.php";
  include_once 'header.php';
  
  if (isset($_GET['event_id'])) {
    $id = $_GET['event_id'];


    $records = $db->showAttendee('semiEvent', $id);
    if($records) {
      foreach ($records as $record) {
        //used protal to access attendees via seminar 
        $attendeeRecords = $record->getRelatedSet('attendee');
          if (FileMaker::isError($attendeeRecords)) {
        } else { 
          foreach ($attendeeRecords as $attendeeRecord) {
            $attendee_id = $attendeeRecord->getField('attendee::attendee_id');
            $name = $attendeeRecord->getField('attendee::name');
            $contact = $attendeeRecord->getField('attendee::contact');
            }
          }  
        } 
      }
    }
  ?>
<body background="./assets/pics/a.jpg">
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <ul class="nav nav-pills">
            <li><img src="./assets/pics/NHCCS_logo_hi-res.gif" height="200" width="300"></li>
            <li><a href="home.php">HOME</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading lead">People who are interested</div>  
          <div class="panel-body">
            <table  class="table table-striped table-bordered table-hover table-condensed">
              <tr>
                <th>Name</th>
                <th>Contact</th>
              </tr>
              <?php
              //displaying content
                echo "<tr>";
                echo "<td>".$name. "</td>";
                echo "<td>".$contact. "</td>";
                echo "</tr>";
              ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
