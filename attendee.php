<?php
/*	
*    File    : Index.php
*		Purpose : Contains all html data and Php data for the login page
*		Author  : Saurabh Mehta	
*/
    include("./config/config.php");
    $PageTitle = "attendee.php";
    include_once 'header.php';
    $rid = $_GET['event_id'];
    $records = $db->portal("semiEvent",$event_id,"attendee");
?>
  <body background="./assets/pics/a.jpg">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <img src="NHCCS_logo_hi-res.gif" height="200" width="300">
      </div>
      <ul class="nav nav-pills">
        <li><a href="home.php">HOME</a></li>
        <li class="active"><a href="./assets/pics/attendee.php">Attendee</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <h1 style="color:red"> Complete list of interested attendees and seminars</h1><br>
    <div class="row">
      <div class="col-md-10">
        <table  class="table-striped table-bordered table-hover table-condensed">
              <tr>
                <th>Title</th>
                <th>PresentedBy</th>
                <th>Name:</th>
                <th>Contact:</th>
              </tr>
              <?php
                if($records) {
                  foreach ($records as $record) {
                    echo "<td>".$record->getField('title'). "</td>";
                    echo "<td>".$record->getField('PresentedBy'). "</td>";
                    echo "<td>".$record->getField("attendee::name"). "</td>";
                    echo "<td>".$record->getField('attendee::contact'). "</td>";
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