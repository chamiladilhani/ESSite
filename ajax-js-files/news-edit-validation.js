jQuery(document).ready(function($){

    // hide messages 
    $("#sent-form-msg").hide();
    $("#error-form-msg").hide();
    var form = $('#newsForm');
    var submit = $('#updateNews');
    
    // on submit...
    form.on('submit', function(e) {
        e.preventDefault();
                            
        $.ajax({
            type:"POST",
            cache: false,
            url: 'ajax-news-edit.php',
            data: form.serialize(),
            success: function (data){
                if(data.indexOf("true") > -1){                 
                    $("#sent-form-msg").fadeIn(500);
                    $("#sent-form-msg").delay(3000).fadeOut(800);
                    //setTimeout(function(){location.href="admin-news-add.php"} , 2000);                     
                }
                else{                                
                    $("#error-form-msg").fadeIn(500);
                    $("#error-form-msg").delay(3000).fadeOut(800);
                    //setTimeout(function(){location.href="admin-news-add.php"} , 2000); 
                }
                
             },
            error:function(request, status, error){
            }
        });
    }); 
});