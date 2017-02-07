<?php
/*	File    : View.php
*		Purpose : views the details of respective seminar
*		Author  : Saurabh Mehta	
*/
  include("./config/config.php");
  $PageTitle = "presentation.php";
  include_once 'header.php';
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
                <th>Name:</th>
                <th>Contact:</th>
              </tr>
              <?php
              //Initializing the database connection
              $records = $db->showAttendee('attendee');
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
        <center>
          <form action="addAttendee.php">
            <br><input type="submit" class="btn btn-success" value="Add Attendee" />
          </form>
        </center>
      </div>
    </body>
  </html>
