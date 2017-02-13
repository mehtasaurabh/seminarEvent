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
  }
?>
  <body background="./assets/pics/a.jpg">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li><img src="./assets/pics/NHCCS_logo_hi-res.gif" height="200" width="300"></li>
            <li><a href="home.php">HOME</a></li>
            <li><a href="addSeminar.php">Add Seminar</a></li>
            <li><a href="attendee.php">Attendee</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading lead">People who are interested</div>  
          <div class="panel-body">
            <div class="table-responsive">
              <table  class="table table-striped table-bordered table-hover table-condensed">
                <tr>
                  <th>Name</th>
                  <th>Contact</th>
                </tr>

                <?php
                $records = $db->showAttendee('semiEvent', $id);
                if($records) {
                  foreach ($records as $record) {
                    //used protal to access attendees via seminar 
                    $attendeeRecords = $record->getRelatedSet('attendee');
                    if (FileMaker::isError($attendeeRecords)) {
                    } else { 
                        foreach ($attendeeRecords as $attendeeRecord) {
                          echo "<tr>";
                          echo "<td>". $name = $attendeeRecord->getField('attendee::name')."</td>";
                          echo "<td>". $contact = $attendeeRecord->getField('attendee::contact')."</td>";
                          echo "</tr>";  
                        }
                      }
                    }
                  } 
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>
