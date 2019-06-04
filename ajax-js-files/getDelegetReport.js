jQuery(document).ready(function($){

    // hide messages     
    $('#eventTable').hide(); 

    var form = $('#delegetForm');
    var submit = $('#submitDeleget');

    // on submit...
    form.on('submit', function(e) {  
        e.preventDefault();

        var dEvent = $("select#dEvent").val();
        var dSubject = $("select#dSubject").val();
        var dEligibility = $("select#dEligibility").val();

        if (dEvent == "" && dSubject == "" && dEligibility == "" && $("#dall:checked").length <= 0) {
            alert("Please select an option");
            return false;
        }      
                        
        $.ajax({
            type:"POST",
            cache: false,
            url: 'ajax-report-deleget.php',
            data: form.serialize(),
            success: function (data){                               
                $('#eventTable').html(data).fadeIn("slow");                  
            },
            error:function(request, status, error){
            }
        }); 
    }); 
});