jQuery(document).ready(function($){

    // hide messages 
    $("#sent-form-msg").hide();
    $("#error-form-msg").hide();
    $("#subjectAdd").hide();
    var form = $('#subjectForm');
    var submit = $('#submitSubject');
    
    // on submit...
    form.on('submit', function(e) {
        e.preventDefault();

        var sname = $("input#name").val();
        if(sname == ""){
            $("#subjectAdd").fadeIn().text("Subject Name required");
            $("input#name").focus();
            return false;
        }
        else{
            $("#subjectAdd").hide();
        }
                    
        $.ajax({
            type:"POST",
            cache: false,
            url: 'ajax-subject-add.php',
            data: form.serialize(),
            success: function (data){
                if(data.indexOf("true") > -1){                 
                    $("#sent-form-msg").fadeIn(500);
                    $('input#name').each(function(){ $(this).val(''); });
                    setTimeout(function(){location.href="admin-subject-add.php"} , 1000);                     
                }
                else{                                  
                    $("#error-form-msg").fadeIn(500);
                    setTimeout(function(){location.href="admin-subject-add.php"} , 1000); 
                }
                
             },
            error:function(request, status, error){
            }
        });
    }); 
});