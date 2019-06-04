jQuery(document).ready(function($){

    // hide messages     
    $('#eventTable').hide(); 

    var form = $('#LecturerForm');
    var submit = $('#submitLecturer');

    // on submit...
    form.on('submit', function(e) {  
        e.preventDefault();

        var lName = $("select#lName").val();
        var lSubject = $("select#lSubject").val();
        var lEligibility = $("select#lEligibility").val();

        if (lName == "" && lSubject == "" && lEligibility == "") {
            alert("Please select an option");
            return false;
        }      
                        
        $.ajax({
            type:"POST",
            cache: false,
            url: 'ajax-report-lecturer.php',
            data: form.serialize(),
            success: function (data){                               
                $('#eventTable').html(data).fadeIn("slow");                  
            },
            error:function(request, status, error){
            }
        }); 
    }); 
});