jQuery(document).ready(function($){

	// hide messages 
	$("#error").hide();
	$("#login-error").hide();
	$("#login-ok").hide();		
	
	// on submit...
	$("#loginForm #login").click(function() {
        
		$("#error").hide();
		        
        // email		
		var email = $("input#email").val();     
        
        if ($.trim(email).length == 0) {
            $("#error").fadeIn().text("Email required");
    		$("input#email").focus();
			return false;
        }
        if (!validateEmail(email)) {
            $("input#email").focus();
            //e.preventDefault();
            return false;
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

		// password
		var password = $("input#password").val();
		if(password == ""){
			$("input#password").focus();
			return false;
		}	

		$.ajax({
            type: "POST",
            url: 'ajax-login.php',
            data: {
                email: $("#email").val(),
                password: $("#password").val()
            },
            success: function(data)
            {
                if (data == 'Successful') {
                    //window.location.replace('index.php').fadeIn(3000);                     
                    $("#login-ok").html("Success! This will redirect in 1sec.");
                    $("#login-ok").show();
                    setTimeout(function(){location.href="index.php"} , 1000);
                }
                else {
                    $("#login-error").html(data);
                    $("#login-error").show();
                    $("#login-error").delay(3000).slideUp();		
                }
            }
        });
		
	});  
			
    return false;
});

