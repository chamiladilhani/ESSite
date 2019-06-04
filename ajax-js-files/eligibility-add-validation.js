jQuery(document).ready(function($){

    // hide messages 
    $("#sent-form-msg").hide();
    $("#error-form-msg").hide();
    var form = $('#eligibilityForm');
    var submit = $('#submitEligibility');
    
    // on submit...
    form.on('submit', function(e) {
        e.preventDefault();
                    
        $.ajax({
            type:"POST",
            cache: false,
            url: 'ajax-eligibility-add.php',
            data: form.serialize(),
            success: function (data){
                if(data.indexOf("true") > -1){                 
                    $("#sent-form-msg").fadeIn(500);
                    setTimeout(function(){location.href="admin-eligibility-add.php"} , 1500);                     
                }
                else{                                  
                    $("#error-form-msg").fadeIn(500);
                    setTimeout(function(){location.href="admin-eligibility-add.php"} , 1500); 
                }
                
             },
            error:function(request, status, error){
            }
        });
    }); 
});