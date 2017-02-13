/*  
*    File    : attendeeValidate.js
*    Purpose : Validation for Attendees
*    Author  : Saurabh Mehta  
*/

$(document).ready(function() {
	

	$("#nameErr").hide();
	$("#contactErr").hide();
	
	var err_name = false;
	var err_contact = false;

	$("#name").focusout(function(){
		check_name();

	});

	$("#contact").focusout(function(){
		check_contact();

	});

	function check_name() {

		var name_length = $("#name").val().length;
		if(name_length == ""){
			$("#nameErr").html("Please enter name");
			$("#nameErr").show();
			return false;
		}
		else{
			$("#nameErr").hide();
		}
	}

	function check_contact(){
		var contact_length = $("#contact").val().length;
		if(contact_length == ""){
			$("#contactErr").html("Please enter your contact number");
			$("#contactErr").show();
			return false;
		}
		else{
			$("#contactErr").hide();
		}
	}

	$("#addAttendee").on('submit',function(){
		
		nameErr = false;
		contactErr = false;

		check_name();
		check_contact();

		if(nameErr === false && contactErr === false) {
			return true;
		} else {
			return false;
		}
	
	});
});


