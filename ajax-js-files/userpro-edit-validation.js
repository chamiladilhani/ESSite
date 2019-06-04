jQuery(document).ready(function($){

	// hide messages 
	$(".errorUseradd").hide();
	$("#useradd-ok").hide();
	$("#useradd-error").hide();
	var form = $('#UseraddForm');
	var submit = $('#submitUser');
	
	// on submit...
	form.on('submit', function(e) {
		e.preventDefault();		
		
		// fname
		var fname = $("input#ufname").val();
		if(fname == ""){
			$("#userAdd-fname").fadeIn().text("First Name required");
			$("input#ufname").focus();
			return false;
		}
		else{
			$("#userAdd-fname").hide();
		}

		// lname
		var lname = $("input#ulname").val();
		if(lname == ""){
			$("#userAdd-lname").fadeIn().text("Last Name required");
			$("input#ulname").focus();
			return false;
		}
		else{
			$("#userAdd-lname").hide();
		}

		// email		
		var email = $("input#uemail").val();     
        
        if ($.trim(email).length == 0) {
            $("#userAdd-email").fadeIn().text("Email required");
    		$("input#uemail").focus();
			return false;
        }
        if (!validateEmail(email)) {
        	$("#userAdd-email").fadeIn().text("Error in email");
            $("input#uemail").focus();
            return false;
        }
        else{
			$("#delegetAdd-email").hide();
		}

        function validateEmail(email) {
            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (filter.test(email)) {
                return true;
            }
            else {
                return false;
            }
        }

        // cemail		
		var cemail = $("input#ucemail").val();     
        
        if ($.trim(cemail).length == 0) {
            $("#userAdd-cemail").fadeIn().text("Confirmation email required");
    		$("input#ucemail").focus();
			return false;
        }
        if (!validateEmail(cemail)) {
        	$("#userAdd-cemail").fadeIn().text("Error in email");
            $("input#ucemail").focus();
            return false;
        }
        else{
			$("#userAdd-cemail").hide();
		}
        
        function validateEmail(cemail) {
            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (filter.test(cemail)) {
                return true;
            }
            else {
                return false;
            }
        }

		// password
		var password = $("input#upassword").val();
		if(password == ""){
			$("#userAdd-password").fadeIn().text("Password required");
			$("input#upassword").focus();
			return false;
		}
		else{
			$("#userAdd-password").hide();
		}

		// cpassword
		var cpassword = $("input#ucpassword").val();
		if(cpassword == ""){
			$("#userAdd-cpassword").fadeIn().text("Confirmation password required");
			$("input#ucpassword").focus();
			return false;
		}
		else{
			$("#userAdd-cpassword").hide();
		}		
			
		$.ajax({
			type:"POST",
			cache: false,
			url: 'ajax-userpro-edit.php',
			data: form.serialize(),
			success: function (data){
			 	if(data == 'Successful'){
			 		$("#useradd-ok").html("Form data updated.");
			 		$("#useradd-ok").fadeIn(500);
			 		$("#useradd-ok").delay(3000).fadeOut(800);
			 	}
			 	else{
			 		$("#useradd-error").html(data);		 				 		
			 		$("#useradd-error").fadeIn(500);
			 		$("#useradd-error").delay(3000).fadeOut(800);
			 	}
			 	
			 }
		});
	}); 
});

