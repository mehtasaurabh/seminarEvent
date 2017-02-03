<?php
	/*	File    : Index.php
		Purpose : Contains all html data and Php data for the login page
		Author  : Saurabh Mehta	*/

  include_once "dbconnect.php";
  $PageTitle = "Presentation.php";
  include_once 'header.php';
?>
  <body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <img src="NHCCS_logo_hi-res.gif" height="200" width="300">
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="Presentation.php">Presentation</a></li>
        <li><a href="addSeminar.php">Add Seminar</a></li>
        <li><a href="attendee.php">Attendee</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <button type="button" class="btn btn-info navbar-btn" data-toggle="modal" data-target="#info">About Us</button>
      </ul>
    </div>
  </nav>
  <div class="container">
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
    <div class="row">
      <div class="col-md-10">
        <div>
          <h1>List of seminars</h1>
          <div class="col-md-5">
            <p class="lead"> TITLE </p>    
          </div>
        </div>
          <table  class="table-striped table-bordered table-hover table-condensed">
            <tr>
              <th>Title</th>
                <th>&nbsp <span class="glyphicon glyphicon-eye-open"></span></th>
    
<?php
   ?>  </div>
   </div></br>
   <form action="addSeminar.php">
    <input type="submit" class="btn btn-success" value="Add Seminar" />
  </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  </body>
</html>




