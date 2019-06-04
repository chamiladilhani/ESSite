jQuery(document).ready(function($){

    // hide messages 
    $("#sent-form-msg").hide();
    $("#error-form-msg").hide();
    $("#userGroup").hide();
    
    var form = $('#UserGroupForm');
    var submit = $('#submitUserGroup');
    
    // on submit...
    form.on('submit', function(e) {
        e.preventDefault();
        $("#errorReport").hide();

        var p_name = $("input#p_name").val();
        var n_name = $("input#n_name").val();

        if(p_name == "" || n_name == ""){
            $("#userGroup").fadeIn().text("Select one option");
            //$("input#name").focus();
            return false;
        }
        else{
            $("#userGroup").hide();
        }
                    
        $.ajax({
            type:"POST",
            cache: false,
            url: 'ajax-usergroup-add.php',
            data: form.serialize(),
            success: function (data){
                if(data.indexOf("true") > -1){                 
                    $("#sent-form-msg").fadeIn(500);
                    $('input#p_name,input#n_name').each(function(){ $(this).val(''); });
                    setTimeout(function(){location.href="admin-user-group.php"} , 1000);                     
                }
                else{                                  
                    $("#error-form-msg").fadeIn(500);
                    setTimeout(function(){location.href="admin-user-group.php"} , 1000); 
                }
                
             },
            error:function(request, status, error){
            }
        });
    }); 
});