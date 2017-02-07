<?php
/*	
*    File    : Index.php
*	   Purpose : Displays list of seminars
*		 Author  : Saurabh Mehta	
*/
  // to connect the database
  include("./config/config.php");
  $pageTitle = "home.php";
  include_once 'header.php';    
  ?>
  <body background="./assets/pics/a.jpg">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <ul class="nav nav-pills">
            <li><img src="./assets/pics/NHCCS_logo_hi-res.gif" height="200" width="300"></li>
            <li class="active"><a href="home.php">HOME</a></li>
            <li><a href="addSeminar.php">Add Seminar</a></li>
            <li><a href="attendee.php">Attendee</a></li>
          </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <button type="button" class="btn btn-info navbar-btn" data-toggle="modal" data-target="#info">About Us</button>
        </ul>
      </div>
    </nav>
    <div class="modal fade" id="info" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">National Heritage</h4>
          </div>
          <div class="modal-body">
            <p >National Heritage Center for Constitutional Studies is renowned institution which conducts various seminars related to constitution of our country. It also deals with information related to law and orders,amendments in our constitution. Last but not the least we also conducts seminars related to latest schemes launched by the government and Bills passed in the parliament.We contact experts in their relative field to deliver lectures and provide their valuable suggestions. </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading lead">List of Seminar</div>  
          <div class="panel-body">
           <table  class="table table-striped table-bordered table-hover table-condensed">
            <tr>
              <th>Title</th>
              <th>Author</th>
              <th>Date</th>
              <th>Title</th>
              <th>&nbsp<span class="glyphicon glyphicon-eye-open"></span></th>
            </tr>
    
            <?php
              //Initializing the database connection
              $records = $db->showSeminar('semiEvent');
              if($records) {
                foreach ($records as $record) { 
                echo "<tr>";
                echo "<td>".$record->getField('title'). "</td>";
                echo "<td>".$record->getField('presentedBy'). "</td>";
                echo "<td>". $record->getField('date'). "</td>";
                echo "<td>". $record->getField('time'). "</td>";    
                echo "<td><a href=\"presentation.php?id=".$record->getrecordid()."\">view</a></td>";
                echo "</tr>";
                }
              }
        ?>
        </table>
        </div>
      </div>
    </div>
    <center>
    <form action="addSeminar.php">
      <br><input type="submit" class="btn btn-success" value="Add Seminar" />
    </form>
    </center>     
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  </body>
</html>




