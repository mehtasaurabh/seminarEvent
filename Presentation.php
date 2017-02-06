<?php
	/*	File    : View.php
		Purpose : views the details of respective seminar
		Author  : Saurabh Mehta	*/



  include_once "dbconnect.php";
  $PageTitle = "presentation.php";
  include_once 'header.php';
?>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <img src="NHCCS_logo_hi-res.gif" height="200" width="300">
      </div>
      <ul class="nav navbar-nav">
      	<li><a href="home.php">HOME</a></li>      
      </ul>
    </div>
  </nav>
  <div class="container">
  	<h1> People who are interested</h1><br>
    <div class="row">
      <div class="col-md-10">
        <table  class="table-striped table-bordered table-hover table-condensed">
              <tr>
                <th>Name:</th>
                <th>Contact:</th>
              </tr>
              <?php
               
                $request = $fm->newFindAllCommand('attendee');
                $result = $request->execute();
                $records = $result->getRecords();
                if (FileMaker::isError($records)) {
                  echo $records->getMessage();
                  if (! isset($result->code) || strlen(trim($result->code)) < 1) {
                    echo 'A System Error Occured';
                  } else {
                    echo 'No Records Found (Error Code: '.$result->code.')';
                  }
                } else {
                  
                  // Loop through the associate records 
                  foreach ($records as $record) {
                  echo "<tr>";
                  echo "<td>".$record->getField('name'). "</td>";
                  echo "<td>".$record->getField('contact'). "</td>";
                  echo "</tr>";
                  }
              }
            ?>
      </div>
      </table>
    <form action="addAttendee.php">
      <br><input type="submit" class="btn btn-success" value="Add Attendee" />
    </form>
  </div>
</div>
  </body>
</html>
