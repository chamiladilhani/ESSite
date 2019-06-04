jQuery(document).ready(function($){

    // hide messages     
    $('#eventTable').hide(); 

    var form = $('#EventForm');
    var submit = $('#submitEvent');

    // on submit...
    form.on('submit', function(e) {  
        e.preventDefault();

        var eLecturer = $("select#eLecturer").val();
        var eSubject = $("select#eSubject").val();
        var eEligibility = $("select#eEligibility").val();
        var eLocation = $("select#eLocation").val(); 

        if (eLecturer == "" && eSubject == "" && eEligibility == "" && eLocation == "" && $("#eall:checked").length <= 0) {
            alert("Please select an option");
            return false;
        }      
                        
        $.ajax({
            type:"POST",
            cache: false,
            url: 'ajax-report-events.php',
            data: form.serialize(),
            success: function (data){                               
                $('#eventTable').html(data).fadeIn("slow");                  
            },
            error:function(request, status, error){
            }
        }); 
    }); 
});