jQuery(document).ready(function($){

	// hide messages 
	$(".errorLectureradd").hide();
	$("#lectureradd-ok").hide();
	$("#lectureradd-error").hide();
	var form = $('#lectureraddForm');
	var submit = $('#submitLectureradd');
	
	// on submit...
	form.on('submit', function(e) {
		e.preventDefault();		
		
		// fname
		var fname = $("input#fname").val();
		if(fname == ""){
			$("#lecturerAdd-fname").fadeIn().text("First Name required");
			$("input#fname").focus();
			return false;
		}
		else{
			$("#lecturerAdd-fname").hide();
		}

		// lname
		var lname = $("input#lname").val();
		if(lname == ""){
			$("#lecturerAdd-lname").fadeIn().text("Last Name required");
			$("input#lname").focus();
			return false;
		}
		else{
			$("#lecturerAdd-lname").hide();
		}

		// email		
		var email = $("input#email").val();     
        
        if ($.trim(email).length == 0) {
            $("#lecturerAdd-email").fadeIn().text("Email required");
    		$("input#email").focus();
			return false;
        }
        if (!validateEmail(email)) {
        	$("#lecturerAdd-email").fadeIn().text("Error in email");
            $("input#email").focus();
            return false;
        }
        else{
			$("#lecturerAdd-email").hide();
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
		var cemail = $("input#cemail").val();     
        
        if ($.trim(cemail).length == 0) {
            $("#lecturerAdd-cemail").fadeIn().text("Confirmation email required");
    		$("input#cemail").focus();
			return false;
        }
        if (!validateEmail(cemail)) {
        	$("#lecturerAdd-cemail").fadeIn().text("Error in email");
            $("input#cemail").focus();
            return false;
        }
        else{
			$("#lecturerAdd-cemail").hide();
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
		var password = $("input#password").val();
		if(password == ""){
			$("#lecturerAdd-password").fadeIn().text("Password required");
			$("input#password").focus();
			return false;
		}
		else{
			$("#lecturerAdd-password").hide();
		}

		// cpassword
		var cpassword = $("input#cpassword").val();
		if(cpassword == ""){
			$("#lecturerAdd-cpassword").fadeIn().text("Confirmation password required");
			$("input#cpassword").focus();
			return false;
		}
		else{
			$("#lecturerAdd-cpassword").hide();
		}

		// contact
		var contact = $("input#contact").val();
		if(contact != "") {
		    var value = contact.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
		    var intRegex = /^\d+$/;
		    if(!intRegex.test(value)) {
		        $("#lecturerAdd-contact").fadeIn().text("Field must be numeric");
				$("input#contact").focus();
            	return false;
		    }
		    else{
		    	$("#lecturerAdd-contact").hide();
		    }
		}
		else {
		    $("#lecturerAdd-contact").fadeIn().text("Contact Number required");
			$("input#contact").focus();
			return false;
		}

		// address :no
		var a_no = $("input#a_no").val();
		if(a_no == ""){
			$("#lecturerAdd-a_no").fadeIn().text("Address no required");
			$("input#a_no").focus();
			return false;
		}
		else{
	    	$("#lecturerAdd-a_no").hide();
	    }

		// address :street
		var a_street = $("input#a_street").val();
		if(a_street == ""){
			$("#lecturerAdd-a_street").fadeIn().text("Address street required");
			$("input#a_street").focus();
			return false;
		}
		else{
	    	$("#lecturerAdd-a_street").hide();
	    }

		// address :city
		var a_city = $("input#a_city").val();
		if(a_city == ""){
			$("#lecturerAdd-a_city").fadeIn().text("Address city required");
			$("input#a_city").focus();
			return false;
		}
		else{
	    	$("#lecturerAdd-a_city").hide();
	    }

		// address :country
		var a_country = $("input#a_country").val();
		if(a_country == ""){
			$("#lecturerAdd-a_country").fadeIn().text("Address country required");
			$("input#a_country").focus();
			return false;
		}
		else{
	    	$("#lecturerAdd-a_country").hide();
	    }

 		// industry category
		var industry_category = $("select#industry_category").val();
		if(industry_category == 0){
			$("#lecturerAdd-industry_category").fadeIn().text("Select a industry category");
			$("select#industry_category").focus();
			return false;
		}
		else{
	    	$("#lecturerAdd-industry_category").hide();
	    }

		// education level
		var education_level = $("select#education_level").val();
		if(education_level == 0){
			$("#lecturerAdd-education_level").fadeIn().text("Select a education level");
			$("select#education_level").focus();
			return false;
		}
		else{
	    	$("#lecturerAdd-education_level").hide();
	    }

		// working exP
		var working_exp = $("input#working_exp").val();
		if(working_exp != "") {
		    var value = working_exp.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
		    var intRegex = /^\d+$/;
		    if(!intRegex.test(value)) {
		        $("#lecturerAdd-working_exp").fadeIn().text("Field must be numeric");
				$("input#working_exp").focus();
            	return false;
		    }
		    else{
		    	$("#lecturerAdd-working_exp").hide();
		    }
		}
		else {
		    $("#lecturerAdd-working_exp").fadeIn().text("working experience required");
			$("input#working_exp").focus();
			return false;
		}

		// company name
		var company_name = $("input#company_name").val();
		if(company_name == ""){
			$("#lecturerAdd-company_name").fadeIn().text("Company name required");
			$("input#company_name").focus();
			return false;
		}
		else{
	    	$("#lecturerAdd-company_name").hide();
	    }

		// company designation
		var company_designation = $("input#company_designation").val();
		if(company_designation == ""){
			$("#lecturerAdd-company_designation").fadeIn().text("Company designation required");
			$("input#company_designation").focus();
			return false;
		}
		else{
	    	$("#lecturerAdd-company_designation").hide();
	    }

		// summary
		var summary = $("textarea#summary").val();
		if(summary == ""){
			$("#lecturerAdd-summary").fadeIn().text("Summary required");
			$("textarea#summary").focus();
			return false;
		}
		else{
	    	$("#lecturerAdd-summary").hide();
	    }

		// experience
		var experience = $("input#experience").val();

		// skills
		var skills = $("input#skills").val();

		// membership
		var membership = $("input#membership").val();
			
		$.ajax({
			type:"POST",
			cache: false,
			url: 'ajax-lecturer-add.php',
			data: form.serialize(),
			success: function (data){
			 	if(data == 'Successful'){	
			 		$("#lectureradd-ok").html("Form data sent. Thanks you. we'll get back to you.");
			 		$("#lectureradd-ok").fadeIn(500);
			 		$("#lectureradd-ok").delay(3000).fadeOut(800);
			 		//setTimeout(function() {$('#adduser').slideUp('slow')}, 2300);
			 		//$('input#fname,input#lname,input#uname,input#password,input#uid').each(function(){ $(this).val(''); });
			 		//setTimeout(function(){location.href="admin-panel.php"} , 3000); 
			 	}
			 	else{		 	
			 		$("#lectureradd-error").html(data);			 		
			 		$("#lectureradd-error").fadeIn(500);
			 		$("#lectureradd-error").delay(3000).fadeOut(800);
			 		//$('input#fname,input#lname,input#uname,input#password,input#uid').each(function(){ $(this).val(''); });
			 		//setTimeout(function(){location.href="admin-panel.php"} , 2000); 
			 	}
			 	
			 }
		});
	}); 
});

