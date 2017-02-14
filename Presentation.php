<?php
/*  File    : View.php
*   Purpose : views the details of respective seminar
*   Author  : Saurabh Mehta 
*/
  // to connect the database
  include("./config/config.php");
  $PageTitle = "presentation.php";
  include_once 'header.php';
  //getting event id sent from home page
  if (isset($_GET['event_id'])) {
    $id = $_GET['event_id'];
    $nameTitle = $_GET['nameTitle'];
    $namePresentedBy =$_GET['namePresentedBy'];
    $nameDate =$_GET['nameDate'];
    $nameTime =$_GET['nameTime'];
  }
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
            <li><a href="home.php">Home</a></li>
            <li><a href="addSeminar.php">Add Seminar</a></li>
            <li><a href="addAttendee.php">Attendee</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading lead" id="panel-heading">People who are interested in <?php echo $nameTitle;?></div>  
          <div class="panel-body">
            <p class="lead">Details of the event</p>
            <div>Title:  <?php echo $nameTitle;?></div>
            <div>Author: <?php echo $namePresentedBy;?></div>
            <div>Date:   <?php echo $nameDate;?></div>
            <div>Time:   <?php echo $nameTime;?></div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  </body>
</html>
