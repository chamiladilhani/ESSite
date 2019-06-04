jQuery(document).ready(function($){

	// hide messages 
	$('#errorprofileAdd').hide();
	$("#profile-ok").hide();
	$("#profile-error").hide();
	var form = $('#profileForm');
	var submit = $('#submitProfile');
	
	// on submit...
	//$("#reportForm #submit").click(function() {
	form.on('submit', function(e) {
		e.preventDefault();
		$("#errorprofileAdd").hide();
		
		// fname
		var fname = $("input#fname").val();
		if(fname == ""){
			$("#errorprofileAdd").fadeIn().text("First Name required");
			$("input#fname").focus();
			$("#fname").css("border-color", "pink");
			return false;
		}
		else{
			$("#fname").css("border-color", "#aaa");
		}

		// lname
		var lname = $("input#lname").val();
		if(lname == ""){
			$("#errorprofileAdd").fadeIn().text("Last Name required");
			$("input#lname").focus();
			$("#lname").css("border-color", "pink");
			return false;
		}
		else{
			$("#lname").css("border-color", "#aaa");
		}

		// uname
		var uname = $("input#uname").val();
		if(uname == ""){
			$("#errorprofileAdd").fadeIn().text("User Name required");
			$("input#uname").focus();
			$("#uname").css("border-color", "pink");
			return false;
		}
		else{
			$("#uname").css("border-color", "#aaa");
		}

		// password
		var password = $("input#password").val();
		if(password == ""){
			$("#errorprofileAdd").fadeIn().text("Password required");
			$("input#password").focus();
			$("#password").css("border-color", "pink");
			return false;
		}
		else{
			$("#password").css("border-color", "#aaa");
		}

 		// role
		var role = $("select#role").val();
		if(role == 0){
			$("#errorprofileAdd").fadeIn().text("Select a role");
			$("select#role").focus();
			$("#role").css("border-color", "pink");
			return false;
		}
		else{
			$("#role").css("border-color", "#aaa");
		}
			
		$.ajax({
			type:"POST",
			cache: false,
			url: 'useradd-validation.php',
			//data: dataString,
			data: form.serialize(),
			success: function (data){
			 	if(data.indexOf("true") > -1){	
			 		//$("#adduser").slideUp(1000);		 		
			 		$("#profile-ok").fadeIn(500);
			 		$("#profile-ok").delay(1000).fadeOut(800);
			 		setTimeout(function() {$('#profileEdit').fadeOut('slow')}, 1500);
			 		setTimeout(function() {$('#proPanel').fadeIn('slow')}, 2000);
			 		//$('input#fname,input#lname,input#uname,input#password,input#uid').each(function(){ $(this).val(''); });
			 		setTimeout(function(){location.href="profile.php"} , 2300); 
			 	}
			 	else{		
			 		//$("#report-form").slideUp();	 				 		
			 		$("#profile-error").fadeIn(500);
			 		$("#profile-error").delay(2000).fadeOut(800);
			 		//$('input#fname,input#lname,input#uname,input#password,input#uid').each(function(){ $(this).val(''); });
			 		//setTimeout(function(){location.href="admin-panel.php"} , 2000); 
			 	}
			 	
			 },
			error:function(request, status, error){
			}
		});
	}); 
});

