<?php
	/*	File    : Index.php
		Purpose : Contains all html data and Php data for the login page
		Author  : Saurabh Mehta	*/
    
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
        <li><a href="Presentation.php">Presentation</a></li>
        <li class="active"><a href="attendee.php">Attendee</a></li>
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

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  </body>
</html>