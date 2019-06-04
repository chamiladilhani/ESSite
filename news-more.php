<?php 

session_start();
include_once 'classes/db.class.php';
include_once 'classes/function.class.php';
include_once 'classes/user.class.php';

$user = new User();

if (isset($_REQUEST['nid'])) {
	$details = $user->getNewsDetails($_REQUEST['nid']);
}

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

	<!-- Core CSS File. The CSS code needed to make eventCalendar works -->
	<link rel="stylesheet" href="css/eventCalendar.css">

	<!-- Theme CSS file: it makes eventCalendar nicer -->
	<link rel="stylesheet" href="css/eventCalendar_theme_responsive.css">

	<style type="text/css">
		.event_defult_style{
			position:absolute;background: #C41330;padding:3px
		}
		.event_defult_style p{
			margin-bottom:0;color:#fff;font-size:11px
		}
		.defult-table{
			color: #555555;
		    font-size: 12px;		    
		}
		.defult-table td, .defult-table th {	  
		  
		  
		  text-align: left;
		  color: #333;
		}
		.defult-table th {
		  color: #333;
		  text-transform: uppercase;
		}
		.defult_a_style{
			text-decoration: none !important;color:#FFFFFF !important;
		}
		.defult_attent{
			font-size:11px;float:left;margin:1px 2px;background:#fff;color:skyblue;padding:1px; border-radius:3px;text-transform: none;
		}
		h3 {
		    color: #888888 !important;
		    font-size: 14px !important;
		    font-weight: normal;
		    text-transform: uppercase;
		}
		.eventsCalendar-currentTitle {
			line-height:25px;
			background-color:#004A8D !important;
			outline:1px solid #004A8D !important;
			border:1px solid #E3E3E3;
			border-width:1px 0;
		}

	</style>

	<?php include('header.php'); ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>

</head>

<body>

<div id="wrapper">

	<div id="headcontainer">
		<?php include('top.php'); ?>
	</div>

	<div id="maincontentcontainer" class="">
		<div id="maincontent">        
	        <div class="breadcrumb">
	            <a href="index.php">Home</a> &raquo; <a href="news.php">News</a> &raquo; <?php echo $details->title; ?>
	        </div>	            
			<div class="section group">
                <div class="col span_3_of_4 content_aside">
					<h1><?php echo $details->title; ?></h1>
                    <h4 class="newsdate"><?php echo date("j F Y", strtotime($details->publish)); ?></h4>
                    
                    <?php
                    if ($details->full) {
						$image = $details->full;
					}
					else{
						$image = 'no_image.gif';
					}
					?>
					<div class="section group">
						<div class="col span_2_of_4">
							<img alt=" & NewsTitle & " src="uploads/news/<?php echo $image; ?>">
						</div>
						<div class="col span_2_of_4">
							 <p>
		                    	<?php echo $details->description; ?>
							</p>
						</div>
					</div> 	
				</div>	

                <div class="col span_1_of_4 pg_aside">
			        <div class="also_in">
			        	<h3 class="accordion-box-header"><div class="accordion-box-link acl1"></div>Recent News Posts</h3>
			        	<ul class="accordion-box-content acc1">
			        		<?php
								$userList = $user->getNews();
								
								if($userList){
									
									foreach($userList as $singleUser){
											
										$singleUser = (object)$singleUser;

										echo '
											<li>&rsaquo; <a href="news-more.php?nid='.$singleUser->id.'">'.$singleUser->title.'</a></li>
										';										
									}
								}
								else{
									echo '
										 <pre style="background:#004A8D;color:#FFFFFF;padding:5px;text-align:center;">No Recent Events.</pre>
									';
								}
							?>							
			            </ul>
			      	</div>
			      	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
					<script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>
					<script>
			        $(function(){
						$(".acl1").click(function(){
							if($(".acc1").is(":visible")){
								//if navigation is visible, hide it and remove "style" element that was added to take care of any specificity issues
								$(".acc1").slideUp("fast", function(){$(this).removeAttr("style")});
							}else{
								//if navigation is hidden show it
								$(".acc1").slideDown("fast");
							}
							return false;
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

	

</body>
</html>