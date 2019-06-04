jQuery(document).ready(function($){

    // hide messages     
    $('#eventTable').hide(); 

    var form = $('#staffForm');
    var submit = $('#submitStaff');

    // on submit...
    form.on('submit', function(e) {  
        e.preventDefault();

        var sRole = $("select#sRole").val();

        if (sRole == "") {
            alert("Please select an option");
            return false;
        }      
                        
        $.ajax({
            type:"POST",
            cache: false,
            url: 'ajax-report-staff.php',
            data: form.serialize(),
            success: function (data){                               
                $('#eventTable').html(data).fadeIn("slow");                  
            },
            error:function(request, status, error){
            }
        }); 
    }); 
});