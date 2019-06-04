jQuery(document).ready(function($){

    // hide messages   
    $("#forgot-ok").hide();
    $("#forgot-error").hide();

    var form = $('#ForgotForm');
    var submit = $('#submitEmail');

    // on submit...
    form.on('submit', function(e) {  
        e.preventDefault();        
                        
        $.ajax({
            type:"POST",
            cache: false,
            url: 'ajax-forgotpassword.php',
            data: form.serialize(),
            success: function (data){
                if(data == 'Successful'){
                    $("#forgot-ok").html("Request successful, please check email.");
                    $("#forgot-ok").fadeIn(500);
                   //$("#forgot-ok").delay(3000).fadeOut(800);
                }
                else{
                    $("#forgot-error").html(data);                              
                    $("#forgot-error").fadeIn(500);
                    $("#forgot-error").delay(3000).fadeOut(800);
                }
                
             }
        }); 
    }); 
});