<?php
	/*	File    : Index.php
		Purpose : Contains all html data and Php data for the login page
		Author  : Saurabh Mehta	*/
    
    include_once "dbconnect.php";
    $PageTitle = "attendee.php";
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
        <li class="active"><a href="attendee.php">Attendee</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <h1> Complete list of interested attendees and seminars</h1><br>
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
                $request = $fm->newFindAllCommand('semiEvent');
                $request->addSortRule('title', 1);
                $request->addSortRule('presentedBy', 2);
                //$request->addSortRule('Accou', 3);
                //$request->addFindCriterion('title',$title);
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
                  echo "<td>".$record->getField('title'). "</td>";
                  echo "<td>".$record->getField('presentedBy'). "</td>";
                  
                  $attendeeRecords= $record->getRelatedSet('attendee');
                           
                  foreach ($attendeeRecords as $attendeeRecord) {

                    echo "<td>".$record->getField('attendee::name'). "</td>";
                    echo "<td>".$record->getField('attendee::contact'). "</td>";
                    echo "</tr>";
                    }
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