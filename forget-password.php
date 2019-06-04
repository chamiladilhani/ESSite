<?php  session_start(); ?>


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
		.errorShow{
			background:red;border-radius:500px;color:#FFFFFF;display:inline;float:left;font-size:11px;margin-bottom:-5px;padding:1px 5px 0;position: relative;top:-7px;
		}
		h3 {
		    color: #888888 !important;
		    font-size: 14px !important;
		    font-weight: normal;
		}
		input{
			width: 50%;
		}
	</style>

	<?php include('header.php'); ?>

</head>

<body>

<div id="wrapper">

	<div id="headcontainer">
		<?php include('top.php'); ?>
	</div>

	<div class="s_about_bg">
        <div class="m_intro"  style="background:url('img/forget.jpg') no-repeat top center;">
        <!--<h1>About Us</h1>-->
        <div style="padding:10px;width:55%;margin:0 auto;">
					<h2 style="margin-top:30px">Having trouble signing in?</h2>
					<h3>A new password will be generated for you and sent to the email address<br>
associated with your account, all you have to do is enter your
username.<br><br></h3>

					<div style="margin:10px 0;display:none;" id="forgot-ok" class="logged-box alert"></div>	
					<div style="margin:10px 0;display:none;" id="forgot-error" class="error-box alert"></div>

				 	<form id="ForgotForm" method="post" action="">
				 		<!--<label>Your email address</label> -->
				 		<input style="margin-bottom: 0; width: 50%;" type="email" id="email" name="email" placeholder="Please enter your login email address" required>
				 		 <button type="submit" id="submitEmail" class="button-success button-small pure-button">Get New Password</button>
				 	</form>
			 	</div>
        </div>
	</div>

	<div id="maincontentcontainer" class="s_about">

		<!--<div id="maincontent" class="group" >
			<div class="section group">
				
			</div>
		</div>		-->
	
	<!-- Footer inserted here -->
	<?php include('footer.php'); ?>

	</div>

	<?php include('footer_includes.php'); ?>

	<script src="ajax-js-files/forgotpassword-validation.js"></script>

</body>
</html>