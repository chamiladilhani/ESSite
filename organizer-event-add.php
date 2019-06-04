<?php  include('header_includes.php'); 

$user = new User();

?>

<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title></title>
	
	<meta name="keywords" content="responsive, grid, system, web design">

	<meta http-equiv="cleartype" content="on">

	<link rel="shortcut icon" href="/favicon.ico">

	<!-- Responsive and mobile friendly stuff -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style type="text/css">

			@font-face {
			  font-family: 'Glyphicons Halflings';

			  src: url('../Glyphicons/glyphicons-halflings-regular.eot');
			  src: url('../Glyphicons/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../Glyphicons/glyphicons-halflings-regular.woff') format('woff'), url('../Glyphicons/glyphicons-halflings-regular.ttf') format('truetype'), url('../Glyphicons/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
			}

			.glyphicon {
			    display: inline-block;
			    font-family: 'Glyphicons Halflings';
			    font-style: normal;
			    font-weight: 400;
			    line-height: 1;
			    position: relative;
			    top: 1px;
			}	

			/* -------------------------------------- */

			ol{
				counter-reset: li;
				list-style: none;
				*list-style: decimal;
				padding: 0;
				margin-bottom: 4em;
				text-shadow: 0 1px 0 rgba(255,255,255,.5);

			}

			ol ol{
				margin: 0 0 0 2em;
			}

			.rounded-list a{
				position: relative;
				display: block;
				padding: .4em .4em .4em 2em;
				*padding: .4em;
				margin: .5em 0;
				background: #ddd;
				color: #444 !important;
				text-decoration: none;
				-moz-border-radius: .3em;
				-webkit-border-radius: .3em;
				border-radius: .3em;
				-webkit-transition: all .3s ease-out;
				-moz-transition: all .3s ease-out;
				-ms-transition: all .3s ease-out;
				-o-transition: all .3s ease-out;
				transition: all .3s ease-out;	
			}

			.rounded-list a:hover{
				background: #eee;
			}

			.rounded-list a:hover:before{
				-moz-transform: rotate(360deg);
			  	-webkit-transform: rotate(360deg);
			    -moz-transform: rotate(360deg);
			    -ms-transform: rotate(360deg);
			    -o-transform: rotate(360deg);
			    transform: rotate(360deg);	
			}

			.rounded-list a:before{
				font-family: 'Glyphicons Halflings';
				content:"\e080";
				counter-increment: li;
				position: absolute;	
				left: -1.3em;
				top: 50%;
				margin-top: -1.3em;
				background: #87ceeb;
				height: 2em;
				width: 2em;
				line-height: 2em;
				border: .3em solid #fff;
				text-align: center;
				-moz-border-radius: 2em;
				-webkit-border-radius: 2em;
				border-radius: 2em;
				-webkit-transition: all .3s ease-out;
				-moz-transition: all .3s ease-out;
				-ms-transition: all .3s ease-out;
				-o-transition: all .3s ease-out;
				transition: all .3s ease-out;
			}
			.eventsCalendar-currentTitle {
				line-height:25px;
				background-color:#42B8DD !important;
				outline:1px solid #42B8DD !important;
				border:1px solid #E3E3E3;
				border-width:1px 0;
			}
	</style>	

	<!-- Core CSS File. The CSS code needed to make eventCalendar works -->
	<link rel="stylesheet" href="css/eventCalendar.css">

	<!-- Theme CSS file: it makes eventCalendar nicer -->
	<link rel="stylesheet" href="css/eventCalendar_theme_responsive.css">

	<?php include('header.php'); ?>

	<link rel="stylesheet" href="css/notification.css">
	<link href="css/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" /></link>

	<style type="text/css">
		/* inside text box drop down button */
		a.tmsel:link, a.tmsel:active, a.tmsel:visited {
			text-decoration: none;
			position: absolute;
			text-indent: -10000px;
			padding: 0;
			width: 16px;
			height: 18px;
			margin: 10px 0 0 -19px;
			background: url(images/dropdown.gif) no-repeat 0 1px;
			line-height: 18px;
		}
		a.tmsel:hover {
			background-position: 0 -17px;
		}

		/* hacks for IE to make the dropdown button vertically centered */
		* html a.tmsel:link, * html a.tmsel:active, * html a.tmsel:visited {
			margin: 3px 0 0 -19px;
		}

		@media only screen and (max-width: 620px) {
		  .hour_24 { width: 100% !important;}			
		}
	</style>

	<script>
	function showUser(){
		 var ajaxRequest;  // The variable that makes Ajax possible!
		
		 try{
		   // Opera 8.0+, Firefox, Safari
		   ajaxRequest = new XMLHttpRequest();
		 }catch (e){
		   // Internet Explorer Browsers
		   try{
		      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		   }catch (e) {
		      try{
		         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
		      }catch (e){
		         // Something went wrong
		         alert("Your browser broke!");
		         return false;
		      }
		   }
		 }
		 // Create a function that will receive data 
		 // sent from the server and will update
		 // div section in the same page.
		 ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4){
		      var ajaxDisplay = document.getElementById('ajaxDiv');
		      ajaxDisplay.innerHTML = ajaxRequest.responseText;
		   }
		 }
		 var edate = document.getElementById('edate').value;
		 if (edate == "") { 
		   return false;
		 }
		 var electurer = document.getElementById('electurer').value;
		 if (electurer == "") { 
		   return false;
		   alert("Please select lecturer.")
		 }
		 var ehour = document.getElementById('ehour').value;
		 if (ehour == "") { 
		   return false;
		 }
		 var ehour_to = document.getElementById('ehour_to').value;
		 if (ehour_to == "") { 
		   return false;
		 }

		 var queryString = "?edate=" + edate ;
		 queryString +=  "&electurer=" + electurer + "&ehour=" + ehour + "&ehour_to=" + ehour_to;
		 
		 ajaxRequest.open("GET", "ajax-getLecturer.php" + 
	                              		queryString, true);	
		ajaxRequest.send(null); 
	}
	function showSeats(){
		 var ajaxRequest;  // The variable that makes Ajax possible!
		
		 try{
		   // Opera 8.0+, Firefox, Safari
		   ajaxRequest = new XMLHttpRequest();
		 }catch (e){
		   // Internet Explorer Browsers
		   try{
		      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		   }catch (e) {
		      try{
		         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
		      }catch (e){
		         // Something went wrong
		         alert("Your browser broke!");
		         return false;
		      }
		   }
		 }
		 // Create a function that will receive data 
		 // sent from the server and will update
		 // div section in the same page.
		 ajaxRequest.onreadystatechange = function(){
		   if(ajaxRequest.readyState == 4){
		      var ajaxDisplay = document.getElementById('ajaxDiv2');
		      ajaxDisplay.innerHTML = ajaxRequest.responseText;
		   }
		 }
		 var evenue = document.getElementById('evenue').value;
		 if (evenue == "") { 
		   return false;
		 }
		 
		 var queryString = "?evenue=" + evenue ;
		 
		 ajaxRequest.open("GET", "ajax-getSeats.php" + 
	                              		queryString, true);	
		ajaxRequest.send(null); 
	}
	</script>

	<link rel="stylesheet" href="css/chosen.css">

    <link rel="stylesheet" href="js/docsupport/prism.css">


</head>

<body>

<div id="wrapper">

	<div id="headcontainer">
		<?php include('top.php'); ?>
	</div>

	<div id="maincontentcontainer" class="s_contact">
		<div id="maincontent">

			<div class="breadcrumb">
            	<a href="index.php">Home</a> &raquo; <a href="organizer-panel.php">Organizer</a> &raquo; Add Event
            </div>

			<div class="section group">
				<div class="col span_1_of_5">
					<div class="also_in">
			        	<h3 class="accordion-box-header"><div class="accordion-box-link acl2"></div><span class="glyphicon glyphicon-dashboard"></span> Navigation</h3>
			        	<ol class="rounded-list acl1">
						    <li><a href="organizer-event-add.php">Create Events</a></li>
						    <li><a href="organizer-event-manage.php">Manage Events</a></li>
						    <li><a href="organizer-send-mail.php">Send Emails</a></li>
						    <li><a href="organizer-event-schedule.php">View Event Schedule</a></li>                        
						</ol>
			      	</div>
			      	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
					<script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>
					<script>
			        $(function(){
						$(".acl2").click(function(){
							if($(".acl1").is(":visible")){
								//if navigation is visible, hide it and remove "style" element that was added to take care of any specificity issues
								$(".acl1").slideUp("fast", function(){$(this).removeAttr("style")});
							}else{
								//if navigation is hidden show it
								$(".acl1").slideDown("fast");
							}
							return false;
						});
			        });
			        </script>		        

				</div>
				
                <div class="col span_3_of_5">              	
                	<h3 style="text-align:center;background:#42B8DD"><span style="color:#fff" class="contactJobtitle">Event Add</span></h3>
            		<div class="section group" style="background:#DDD;">
	            		<div class="col span_4_of_4">
	            			<div style="padding:0 10px;width:93%;margin:0 auto;">
								<form id="eventForm" action="" method="post" enctype="multipart/form-data">									
			                        
			                        <label for="">Event Name <i>*</i></label>  
			                        <input type="text" id="ename" name="ename" required placeholder="Please enter event name">

			                        <label for="">Event Category <i>*</i></label>  
			                        <select required name="ecategory_id" id="ecategory_id">
			                        	<option value="">Select</option>
			                        	<?php 
											$role = new User();
											echo array2dropdown($role->getSubjectDropDown());
										?>
			                        </select> 
			                        <img style="display:none;" id="jaximage" src="img/loading.gif" />
			                         
			                        <div style="display:none;" id="loadLecturer"></div>

			                        <label for="">Date & Time <i>*</i></label>  
			                        <div class="section group">
			                        	<div class="col span_1_of_6">
			                        		<input style="width:90%;margin-bottom:0;" type="text" id="edate" name="edate" class="datepicker" required placeholder="Please enter date">
			                        	</div>
			                        	<div class="col span_1_of_6" onchange="showUser()">
			                        		<select class="hour_24" style="margin-bottom:0;" required name="ehour" id="ehour">
					                        	<option value="">Hour</option>
					                        	<?php 
													for ($i=1; $i<=24; $i++){
														if($i < 10){
															echo'<option value="0'.$i.'">0'.$i.'</option>';
														}
														else{
															echo'<option value="'.$i.'">'.$i.'</option>';
														}
													}
												?>
					                        </select>					                        
					                    </div>
					                    <div class="col span_1_of_6">					                        
					                        <select class="hour_24" style="margin-bottom:0;" required name="eminute">
					                        	<option value="">Minute</option>
					                        	<?php 
													for ($i=0; $i<=59; $i++){
														if($i < 10){
															echo'<option value="0'.$i.'">0'.$i.'</option>';
														}
														else{
															echo'<option value="'.$i.'">'.$i.'</option>';
														}
													}
												?>
					                        </select>
					                    </div>
					                    <div class="col span_1_of_6"> 
					                    	<p style="">to</p>	
					                    </div>				                    
					                    <div class="col span_1_of_6" onchange="showUser()"> 	
					                        <select class="hour_24" style="margin-bottom:0;" required name="ehour_to" id="ehour_to">
					                        	<option value="">Hour</option>
					                        	<?php 
													for ($i=1; $i<=24; $i++){
														if($i < 10){
															echo'<option value="0'.$i.'">0'.$i.'</option>';
														}
														else{
															echo'<option value="'.$i.'">'.$i.'</option>';
														}
													}
												?>
					                        </select>
					                    </div>
					                    <div class="col span_1_of_6">    
					                        <select class="hour_24" style="margin-bottom:0;" required name="eminute_to">
					                        	<option value="">Minute</option>
					                        	<?php 
													for ($i=0; $i<=59; $i++){
														if($i < 10){
															echo'<option value="0'.$i.'">0'.$i.'</option>';
														}
														else{
															echo'<option value="'.$i.'">'.$i.'</option>';
														}
													}
												?>
					                        </select>
			                        	</div>
			                        	<div style="float:left;width:100%" id="ajaxDiv"></div>
			                        </div>	
			                        <p style="display:none;" id="timeError"></p>

			                        <label for="">Location <i>*</i></label>  
			                        <select required name="elocation" id="elocation">
			                        	<option value="">Select</option>
			                        	<?php 
			                        		$role = new User();
			                        		echo array2dropdown($role->getLocationDropDown());
			                        	?>
			                        </select>
			                        <img style="display:none;" id="jaximage" src="img/loading.gif" />
			                         
			                        <div style="display:none;overflow-x:auto;" id="loadcity"></div>  

			                        <label for="">Multimedia <i>*</i></label>  
			                        <select required name="multimedia[]" id="multimedia" multiple class="chosen-select" tabindex="2">
			                        	<?php 
			                        		$role = new User();
			                        		echo array2dropdown($role->getMultimediaDropDown());
			                        	?>
			                        </select>			                                               

			                        <label style="margin-top:15px">Eligibility Criteria <i>*</i></label>  
			                        <select required name="eligibility_id">
			                        	<option value="">Select Eligibility</option>
			                        	<?php 
											$role = new User();
											echo array2dropdown($role->getEligibilityDropDown());
										?>
			                        </select>

			                        <label for="">Supporters <i>*</i></label>  
			                        <select required name="supporters[]" id="supporters" multiple class="chosen-select" tabindex="2">
			                        	<?php 
			                        		$role = new User();
			                        		echo array2dropdown($role->getSupportDropDown());
			                        	?>
			                        </select>

			                        <p><label for="">Description <i>*</i></label>
                        			<textarea id="edescription" name="edescription" tabindex="5" required></textarea></p>

                        			<label for="">Organized by <i>*</i></label>  
			                        <input type="text" id="o_by" name="o_by" required placeholder="">

                        			<div style="display:none;margin-bottom:10px;" id="sent-form-msg" class="success-box alert">
										New event added.						
										<a class="toggle-alert" href="#">Toggle</a>
									</div>
									<div style="display:none;margin-bottom:10px;" id="error-form-msg" class="error-box alert">
										Sorry, something goes wrong.					
										<a class="toggle-alert" href="#">Toggle</a>
									</div>                  	                       

			                        <button type="submit" name="submitEvent" id="submitEvent" class="button-secondary pure-button">Create New</button>
			                    </form>  
			                </div>      
            			</div>
            		</div>  

                </div>

                <div class="col span_1_of_5">
                	<div id="eventCalendarHumanDate"></div>
					<script>
						$(document).ready(function() {
							$("#eventCalendarHumanDate").eventCalendar({
								eventsjson: 'json/event.humanDate.json.php',
								jsonDateFormat: 'human'  // 'YYYY-MM-DD HH:MM:SS'
							});
						});
					</script>                 	
                </div>
          	</div>

		</div>

	</div>	
	
	<!-- Footer inserted here -->
	<?php include('footer.php'); ?>

</div>

	<?php include('footer_includes.php'); ?>

	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script type="text/javascript">
		$( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
	</script>	

	<script src="js/jquery.eventCalendar.js" type="text/javascript"></script>

	<script>
		$(document).ready(function(){			
		    $("#ehour").change(function(){ 
			   	var ehour = $(this).val();
			    var ehour_to = $('#ehour_to').val();

			    if(ehour_to != ""){
			    	if(ehour_to > ehour){
			    		$("#timeError").hide();
			    		$("#ajaxDiv").show();
			    	}
			    	else{
			    		$("#timeError").fadeIn().text("Are you kidding me? time not possible. check again :(");
			    		$("#timeError").css("color", "red");
			    		$("#ajaxDiv").hide();
			    		return false;
			    	}
			    }
			});

			$("#ehour_to").change(function(){ 
			   	var ehour_to = $(this).val();
			    var ehour = $('#ehour').val();

			    if(ehour_to != ""){
			    	if(ehour_to > ehour){
			    		$("#timeError").hide();
			    		$("#ajaxDiv").show();
			    	}
			    	else{
			    		$("#timeError").fadeIn().text("Are you kidding me? time not possible. check again :(");
			    		$("#timeError").css("color", "red");
			    		$("#ajaxDiv").hide();
			    		return false;
			    	}
			    }
			});
		});
	</script>

	<script type="text/javascript">
	$(document).ready(function(){
		$('#elocation').change(function(){
			var postdata = $('#elocation').val();
			
			$('#jaximage').fadeIn("slow");
			$('#loadcity').css("display", "none");
			$.ajax({ 
				type:'post',
				url: 'ajax-getVenue.php',
				data: {udata: postdata},
				success: function(data){ 
					$('#jaximage').css("display", "none");
					$('#loadcity').html(data).fadeIn("slow"); 
				}
			});		
		});
		$('#ecategory_id').change(function(){
			var postdata = $('#ecategory_id').val();
			
			$('#jaximage').fadeIn("slow");
			$('#loadLecturer').css("display", "none");
			$.ajax({ 
				type:'post',
				url: 'ajax-getLecturerDropdown.php',
				data: {udata: postdata},
				success: function(data){ 
					$('#jaximage').css("display", "none");
					$('#loadLecturer').html(data).fadeIn("slow"); 
				}
			});		
		});
	});
	</script>

	<script src="ajax-js-files/event-add-validation.js"></script>

	<script src="js/chosen.jquery.js" type="text/javascript"></script>
	  <script src="js/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
	  <script type="text/javascript">
	    var config = {
	      '.chosen-select'           : {},
	      '.chosen-select-deselect'  : {allow_single_deselect:true},
	      '.chosen-select-no-single' : {disable_search_threshold:10},
	      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
	      '.chosen-select-width'     : {width:"95%"}
	    }
	    for (var selector in config) {
	      $(selector).chosen(config[selector]);
	    }
	  </script>

</body>
</html>