jQuery(document).ready(function($){

    // hide messages 
    $("#sent-form-msg").hide();
    $("#error-form-msg").hide();
    var form = $('#eventUpdateForm');
    var submit = $('#updateEvent');
    
    // on submit...
    form.on('submit', function(e) {
        e.preventDefault();
                    
        $.ajax({
            type:"POST",
            cache: false,
            url: 'ajax-event-edit.php',
            data: form.serialize(),
            success: function (data){
                if(data.indexOf("true") > -1){                                
                    $("#sent-form-msg").fadeIn(500);
                    setTimeout(function(){location.href="organizer-event-manage.php"} , 2500);                     
                }
                else{                                  
                    $("#error-form-msg").fadeIn(500);
                    //setTimeout(function(){location.href="organizer-event-edit.php"} , 2500); 
                }
                
             },
            error:function(request, status, error){
            }
        });
    }); 
});