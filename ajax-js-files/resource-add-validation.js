jQuery(document).ready(function($){

    // hide messages 
    $("#sent-form-msg").hide();
    $("#error-form-msg").hide();
    var form = $('#resourceForm');
    var submit = $('#submitResource');
    
    // on submit...
    form.on('submit', function(e) {
        e.preventDefault();
                    
        var type = $("select#select-room").val();
        if (type == 'Room') {

            // no of seats
            var seats = $("input#no_of_seats").val();
            if(seats == ""){
                $("input#no_of_seats").focus();
                alert("No of seats requred")
                return false;
            }

            // location
            var loc = $("select#location").val();
            if(loc == ""){
                $("select#location").focus();
                alert("Location requred")
                return false;
            }
        }
        else{
            $('input#no_of_seats,input#location').each(function(){ $(this).val(''); });
        }
                    
        $.ajax({
            type:"POST",
            cache: false,
            url: 'ajax-resource-add.php',
            data: form.serialize(),
            success: function (data){
                if(data.indexOf("true") > -1){                 
                    $("#sent-form-msg").fadeIn(500);
                    setTimeout(function(){location.href="admin-resource-add.php"} , 2500);                     
                }
                else{                                
                    $("#error-form-msg").fadeIn(500);
                    setTimeout(function(){location.href="admin-resource-add.php"} , 2500); 
                }
                
             },
            error:function(request, status, error){
            }
        });
    }); 
});