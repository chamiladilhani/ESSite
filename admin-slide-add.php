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
	<link href="css/slider-style.css" rel="stylesheet" type="text/css" />

</head>

<body>

<div id="wrapper">

	<div id="headcontainer">
		<?php include('top.php'); ?>
	</div>

	<div id="maincontentcontainer" class="s_contact">
		<div id="maincontent">

			<div class="breadcrumb">
            	<a href="index.php">Home</a> &raquo; <a href="admin-panel.php">Administrator</a> &raquo; <a href="admin-maintain.php">Site maintain</a> &raquo; Create news
            </div>

			<div class="section group">
				<div class="col span_1_of_5">
					<div class="also_in">
			        	<h3 class="accordion-box-header"><div class="accordion-box-link acl2"></div><span class="glyphicon glyphicon-dashboard"></span> Navigation</h3>
			        	<ol class="rounded-list acl1">						    
						    <li><a>Manage Users</a>
						    	<ol>
						            <li><a href="admin-user-group.php">User Groups</a></li>
						            <li><a href="admin-user-add.php">Create Users</a></li>
						        </ol>
						    </li>
						    <li><a href="admin-resource-add.php">Manage Resource</a></li>
						    <li><a href="admin-subject-add.php">Manage Subject Area</a></li>
						    <li><a href="admin-eligibility-add.php">Manage Eligibility Area</a></li>						    
						    <li><a href="admin-room-manage.php">Rooms</a></li>
						    <li><a href="admin-lecturer-manage.php">Lectures</a></li>
						    <li><a href="admin-multimedia-manage.php">Multimedia</a></li>
						    <li><a href="admin-maintain.php">Site maintain</a>
						    	<ol>
						            <li><a href="admin-news-add.php">Create News</a></li>
						            <li><a href="admin-slide-add.php">Create Slides</a></li>
						        </ol>
						    </li>
						    <li><a href="admin-report-view.php">View Reports</a></li>                         
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
                	<h3 style="text-align:center;background:#42B8DD"><span style="color:#fff" class="contactJobtitle">create news</span></h3>
            		<div class="section group" style="background:#DDD;">
	            		<div class="col span_4_of_4">
	            			<div style="width:93%;margin:0 auto;">
								<div id="uploaderform">
									<form action="upload-slide-images.php" method="post" enctype="multipart/form-data" name="UploadForm" id="UploadForm">
									    <h1>Upload Multiple Images</h1>
									    <p>Each recommended image file size must be less than 1MB! & image width and height must be consecutively 1192 X 400.</p>
									    
									    <label>Files
									    <span class="small"><a href="#" id="AddMoreFileBox">Add More Files</a></span>
									    </label>
									    <div id="AddFileInputBox"><input id="fileInputBox" style="margin-bottom: 5px;" type="file"  name="file[]"/></div>
									    <div class="sep_s"></div>
									    
									    <!--<label>Name
									    <span class="small">Enter your name</span>
									    </label>
									    <div><input name="username" type="text" id="username" value="Jack Sparrow" /></div>
									    
									    <label>Location
									    <span class="small">Your Location</span>
									    </label>
									    <div><input name="userlocation" type="text" id="userlocation" value="Troubadour" /></div>-->
									    
									    <button type="submit" class="button" id="SubmitButton">Upload</button>
									    
									    <div id="progressbox"><div id="progressbar"></div ><div id="statustxt">0%</div ></div>
									</form>
								</div>
								<div id="uploadResults">
									<div align="center" style="margin:20px;"><a href="#" id="ShowForm">Toggle Form</a></div>
								    <div id="output"></div>
								</div>
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

	<script src="js/jquery.eventCalendar.js" type="text/javascript"></script>

	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript"> 
	$(document).ready(function() { 
	//elements
	var progressbox 		= $('#progressbox'); //progress bar wrapper
	var progressbar 		= $('#progressbar'); //progress bar element
	var statustxt 			= $('#statustxt'); //status text element
	var submitbutton 		= $("#SubmitButton"); //submit button
	var myform 				= $("#UploadForm"); //upload form
	var output 				= $("#output"); //ajax result output element
	var completed 			= '0%'; //initial progressbar value
	var FileInputsHolder 	= $('#AddFileInputBox'); //Element where additional file inputs are appended
	var MaxFileInputs		= 3; //Maximum number of file input boxs

	// adding and removing file input box
	var i = $("#AddFileInputBox div").size() + 1;
	$("#AddMoreFileBox").click(function(event){
			event.returnValue = false;
			if(i < MaxFileInputs)
			{
				$('<span><input type="file" id="fileInputBox" size="20" name="file[]" class="addedInput" value=""/><a href="#" class="removeclass small2"><img src="img/close_icon.gif" border="0" /></a></span>').appendTo(FileInputsHolder);
				i++;
			}
			return false;
	});

	$("body").on("click",".removeclass", function(event){
			event.returnValue = false;
			if( i > 1 ) {
					$(this).parents('span').remove();i--;
			}
			
	}); 

	$("#ShowForm").click(function () {
	  $("#uploaderform").slideToggle(); //Slide Toggle upload form on click
	});
		
	$(myform).ajaxForm({
		beforeSend: function() { //brfore sending form
			submitbutton.attr('disabled', ''); // disable upload button
			statustxt.empty();
			progressbox.show(); //show progressbar
			progressbar.width(completed); //initial value 0% of progressbar
			statustxt.html(completed); //set status text
			statustxt.css('color','#000'); //initial color of status text
			
		},
		uploadProgress: function(event, position, total, percentComplete) { //on progress
			progressbar.width(percentComplete + '%') //update progressbar percent complete
			statustxt.html(percentComplete + '%'); //update status text
			if(percentComplete>50)
				{
					statustxt.css('color','#fff'); //change status text to white after 50%
				}else{
					statustxt.css('color','#000');
				}
				
			},
		complete: function(response) { // on complete
			output.html(response.responseText); //update element with received data
			myform.resetForm();  // reset form
			submitbutton.removeAttr('disabled'); //enable submit button
			progressbox.hide(); // hide progressbar
			$("#uploaderform").slideUp(); // hide form after upload
		}
	});

	}); 
	</script> 

</body>
</html>