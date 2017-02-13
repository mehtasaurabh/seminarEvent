/*  
*    File    : seminarValidate.js
*    Purpose : Validation for seminars
*    Author  : Saurabh Mehta  
*/

$(document).ready(function() {
	

	$("#titleErr").hide();
	$("#presentedByErr").hide();
	
	var err_title = false;
	var err_presentedBy = false;

	$("#title").focusout(function(){
		check_title();

	});

	$("#presentedBy").focusout(function(){
		check_presentedBy();

	});

	function check_title() {

		var title_length = $("#title").val().length;
		if(title_length == ""){
			$("#titleErr").html("Please enter title");
			$("#titleErr").show();
			return false;
		}
		else{
			$("#titleErr").hide();
		}
	}

	function check_presentedBy(){
		var presentedBy_length = $("#presentedBy").val().length;
		if(presentedBy_length == ""){
			$("#presentedByErr").html("Please enter Orator");
			$("#presentedByErr").show();
			return false;
		}
		else{
			$("#presentedByErr").hide();
		}
	}
	$("#addSeminar").on('submit',function(){
		
		titleErr = false;
		presentedByErr = false;

		check_title();
		check_presentedBy();

		if(titleErr === false && presentedByErr === false) {
			return true;
		} else {
			return false;
		}
	
	});
});


