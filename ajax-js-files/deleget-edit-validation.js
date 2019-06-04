jQuery(document).ready(function($){

	// hide messages 
	$(".errorDelegetadd").hide();
	$("#delegetadd-ok").hide();
	$("#delegetadd-error").hide();
	var form = $('#delegetaddForm');
	var submit = $('#submitDelegetadd');
	
	// on submit...
	form.on('submit', function(e) {
		e.preventDefault();		
		
		// fname
		var fname = $("input#dfname").val();
		if(fname == ""){
			$("#delegetAdd-fname").fadeIn().text("First Name required");
			$("input#dfname").focus();
			return false;
		}
		else{
			$("#delegetAdd-fname").hide();
		}

		// lname
		var lname = $("input#dlname").val();
		if(lname == ""){
			$("#delegetAdd-lname").fadeIn().text("Last Name required");
			$("input#dlname").focus();
			return false;
		}
		else{
			$("#delegetAdd-lname").hide();
		}

		// email		
		var email = $("input#demail").val();     
        
        if ($.trim(email).length == 0) {
            $("#delegetAdd-email").fadeIn().text("Email required");
    		$("input#demail").focus();
			return false;
        }
        if (!validateEmail(email)) {
        	$("#delegetAdd-email").fadeIn().text("Error in email");
            $("input#demail").focus();
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
		var cemail = $("input#dcemail").val();     
        
        if ($.trim(cemail).length == 0) {
            $("#delegetAdd-cemail").fadeIn().text("Confirmation email required");
    		$("input#dcemail").focus();
			return false;
        }
        if (!validateEmail(cemail)) {
        	$("#delegetAdd-cemail").fadeIn().text("Error in email");
            $("input#dcemail").focus();
            return false;
        }
        else{
			$("#delegetAdd-cemail").hide();
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
		var password = $("input#dpassword").val();
		if(password == ""){
			$("#delegetAdd-password").fadeIn().text("Password required");
			$("input#dpassword").focus();
			return false;
		}
		else{
			$("#delegetAdd-password").hide();
		}

		// cpassword
		var cpassword = $("input#dcpassword").val();
		if(cpassword == ""){
			$("#delegetAdd-cpassword").fadeIn().text("Confirmation password required");
			$("input#dcpassword").focus();
			return false;
		}
		else{
			$("#delegetAdd-cpassword").hide();
		}

		// contact
		var contact = $("input#dcontact").val();
		if(contact != "") {
		    var value = contact.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
		    var intRegex = /^\d+$/;
		    if(!intRegex.test(value)) {
		        $("#delegetAdd-contact").fadeIn().text("Field must be numeric");
				$("input#dcontact").focus();
            	return false;
		    }
		    else{
		    	$("#delegetAdd-contact").hide();
		    }
		}
		else {
		    $("#delegetAdd-contact").fadeIn().text("Contact Number required");
			$("input#dcontact").focus();
			return false;
		}

 		// industry category
		var industry_category = $("select#dindustry_category").val();
		if(industry_category == 0){
			$("#delegetAdd-industry_category").fadeIn().text("Select a industry category");
			$("select#dindustry_category").focus();
			return false;
		}
		else{
	    	$("#delegetAdd-industry_category").hide();
	    }

		// education level
		var education_level = $("select#deducation_level").val();
		if(education_level == 0){
			$("#delegetAdd-education_level").fadeIn().text("Select a education level");
			$("select#deducation_level").focus();
			return false;
		}
		else{
	    	$("#delegetAdd-education_level").hide();
	    }

	    // education level
	    var rates = document.getElementsByName('professionally_qualified');
        var professionally_qualified;
        var isItemChecked = false;
        for(var i = 0; i < rates.length; i++){
            var listItem = rates[i];            
            if(listItem.checked){
                professionally_qualified = listItem.value;
                isItemChecked = true;
                break;
            }
        }
        if (isItemChecked == false) {
            if (isItemChecked == "") {
            	$("#delegetAdd-professionally_qualified").fadeIn().text("Select YES or No");
            	$("input#dprofessionally_qualified").focus();
                return false;
            }
        }

        // working exp
        if (professionally_qualified == 'YES') {
        	var working_exp = $("input#dworking_exp").val();
			if(working_exp != "") {
			    var value = working_exp.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
			    var intRegex = /^\d+$/;
			    if(!intRegex.test(value)) {
			        $("#delegetAdd-working_exp").fadeIn().text("Field must be numeric");
					$("input#dworking_exp").focus();
	            	return false;
			    }
			    else{
			    	$("#delegetAdd-working_exp").hide();
			    }
			}
			else {
			    $("#delegetAdd-working_exp").fadeIn().text("Working experience required");
				$("input#dworking_exp").focus();
				return false;
			}
        }		
			
		$.ajax({
			type:"POST",
			cache: false,
			url: 'ajax-deleget-edit.php',
			data: form.serialize(),
			success: function (data){
			 	if(data == 'Successful'){
			 		$("#delegetadd-ok").html("Form data updated.");
			 		$("#delegetadd-ok").fadeIn(500);
			 		$("#delegetadd-ok").delay(3000).fadeOut(800);
			 	}
			 	else{
			 		$("#delegetadd-error").html(data);		 				 		
			 		$("#delegetadd-error").fadeIn(500);
			 		$("#delegetadd-error").delay(3000).fadeOut(800);
			 	}
			 	
			 }
		});
	}); 
});

