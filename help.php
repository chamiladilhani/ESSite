<?php 
session_start();

include_once 'classes/db.class.php';
include_once 'classes/function.class.php';
include_once 'classes/lecturer.class.php';
include_once 'classes/user.class.php';

$lecturer = new Lecturer();
$usr = new User();

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
		h3 {
		    color: #888888 !important;
		    font-size: 14px !important;
		    font-weight: normal;
		    text-transform: uppercase;
		}
		.video-container {
		    position: relative;
		    padding-bottom: 56.25%;
		    padding-top: 30px; height: 0; overflow: hidden;
		}
		 
		.video-container iframe,
		.video-container object,
		.video-container embed {
		    position: absolute;
		    top: 0;
		    left: 0;
		    width: 80%;
		    height: 80%;
		    margin-left: 10.3334%;
		}
	</style>

	<?php include('header.php'); ?>

</head>

<body>

<div id="wrapper">

	<div id="headcontainer">
		<?php include('top.php'); ?>
	</div>

	<div id="maincontentcontainer" class="our_help">
		<div id="maincontent">

			<div class="breadcrumb">
            	<a href="index.php">Home</a> &raquo; Help
            </div>

			<div class="section group">
				<h1>Help</h1>

	                <div class="col span_2_of_4 content_aside" style="margin-left:0;">  
                		<div class="video-container">
                			<iframe width="560" height="315" src="//www.youtube.com/embed/6gah67qMUmY" frameborder="0" allowfullscreen></iframe>
                		</div>    
	                </div>

	                <div class="col span_2_of_4 pg_aside" style="margin-left:0;">	                	
	                	<h4>Special Request</h4>     

	                	<div style="display:none;margin-bottom:10px;" id="sent-form-msg" class="success-box alert">
							Your request has been submitted successfully.					
							<a class="toggle-alert ta" href="#">Toggle</a>
						</div>

	                    <form id="loginForm" method="post" data-ajax="false">
	                    	<div style="display:none;" id="login-ok" class="logged-box alert"></div>	
							<div style="display:none;" id="login-error" class="error-box error-login alert"></div>

	                        <label for="">Your Name </label>                     
	                        <input type="text" name="name" id="name" required placeholder="Please enter your name">

	                        <label for="">Your Email Address</label>  
	                        <input type="text" name="mail" id="mail" required placeholder="Please enter your email">

	                        <label for="">Your Telephone Number</label>  
	                        <input type="text" name="tele" id="tele" required placeholder="Please enter your telephone number">

	                        <label for="">Your Request</label>  
	                        <textarea id="request" placeholder="Please enter your request" name="request" rows="5" style="height:auto;margin-bottom:10px;"></textarea>

	                        <button type="button" name="add" id="add" class="button-secondary button-small pure-button">Send</button>		                        
	                    </form>	                    
	                </div>
  
          	</div>

		</div>	
	</div>	
	
	<!-- Footer inserted here -->
	<?php include('footer.php'); ?>

</div>

	<?php include('footer_includes.php'); ?>

	<script>
	jQuery(document).ready(function($){
		jQuery("#add").click(function() {
			var name = jQuery("#name").val();
			if (name ==''){
				jQuery("#name").focus();
				return false;
			}
			var mail = jQuery("#mail").val();
			if (mail ==''){
				jQuery("#mail").focus();
				return false;
			}
			var tele = jQuery("#tele").val();
			if (tele ==''){
				jQuery("#tele").focus();
				return false;
			}
			var request = jQuery("#request").val();
			if (request ==''){
				jQuery("#request").focus();
				return false;
			}
			jQuery("#loginForm").slideUp('slow');
			jQuery("#sent-form-msg").slideDown('slow');
		});
	});
	</script>

	<script>
	  jQuery(document).ready(function() {
	  $(".alert .ta").click(function(){
	    $(this).closest(".alert").slideUp(500);
	    $("#loginForm").slideDown('slow');
	    $('input#name,input#mail,input#tele,textarea#request').each(function(){ $(this).val(''); });
	    return false;
	  });
	  });
	</script>
		
	</script>

</body>
</html>