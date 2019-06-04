<?php  //include('header_includes.php'); 
session_start();
include_once 'classes/db.class.php';
include_once 'classes/function.class.php';
include_once 'classes/user.class.php';

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

</head>

<body>

<div id="wrapper">

	<div id="headcontainer">
		<?php include('top.php'); ?>
	</div>

	<div id="maincontentcontainer" class="">
		<div id="maincontent">

			<div class="breadcrumb">
            	<a href="index.php">Home</a> &raquo; <a href="event.php">Events</a> &raquo; Past Events
            </div>

			<div class="section group">				
                <div class="col span_3_of_4 content_aside" style="margin-left:0;">
                	<h1>Past Events</h1>
	                <div class="section group">
	                	<div class="col span_4_of_4">
		                    <ul class="news">
		                    	<?php
									$userList = $user->getPastEventsRow();
									
									if($userList){
										
										foreach($userList as $singleUser){
												
											$singleUser = (object)$singleUser;

											if ($singleUser->cancel_note == "") {
												
												if ($singleUser->full_img) {
													$image = $singleUser->full_img;
												}
												else{
													$image = 'education-sky.png';
												}
													
												echo '
													<li>
						                            	<div class="app-date event_defult_style">
															<p class="newsdate">'.date("jS F, Y", strtotime($singleUser->edate)).'</p>
														</div>
						                                <img class="newsthumbnail" src="uploads/events/'.$image.'">

						                                <div class="newstext">
						                                    <h3>'.$singleUser->ename.'
						                                 ';
						                                if (isset($_SESSION['uid'])) {
						                                 	if ($_SESSION['role'] == 'Deleget') {
							                                	$user_eligibility = $user->getUserEligibility($_SESSION['uid']);

							                                	if ($singleUser->eligibility_id == $user_eligibility->education_level) {
							                                		echo ' <img src="img/icons/correct.gif" >';
							                                	}
							                                }
						                                 }
						                                    
						                                echo '  </h3>   
						                                	<p>'.current(explode("\n", wordwrap($singleUser->edescription, 150, "...\n"))).'</p>
						                                    
						                                    <a class="gen" href="event-more.php?eid='.$singleUser->id.'">Read Full Event</a>
						                                </div>
						                            </li>
												';
											}
											else{
												echo '
													<li>
						                                <img class="newsthumbnail" src="uploads/events/event-cancelled.jpg">

						                                <div class="newstext">
						                                    <h3>'.$singleUser->ename.'</h3>
						                                    ';
						                                 echo '   
						                                    <p style="margin-bottom:2px;"><b>NOTE : </b>'.current(explode("\n", wordwrap($singleUser->cancel_note, 150, "...\n"))).'</p>
						                                    
						                                    <a class="gen" href="event-more.php?eid='.$singleUser->id.'">Read Story</a>
						                                </div>
						                            </li>
												';
											}										
										}
									}
									else{
										echo '
											 <pre style="background:#004A8D;color:#FFFFFF;padding:5px;text-align:center;">No Past Events.</pre>
										';
									}
								?>
		                    </ul>
		                </div>    
	                </div>

                </div>
                <div class="col span_1_of_4 pg_aside">
                	<div class="also_in">
			        	<h3 class="accordion-box-header"><div class="accordion-box-link acl1"></div>Recent Event Posts</h3>
			        	<ul class="accordion-box-content acc1">
			        		<?php
								$userList = $user->getEventsRow();
								
								if($userList){
									
									foreach($userList as $singleUser){
											
										$singleUser = (object)$singleUser;

										echo '
											<li>&rsaquo; <a href="event-more.php?eid='.$singleUser->id.'">'.$singleUser->ename.'</a></li>
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
			      	
					<script src="js/jquery-1.7.2.min.js"></script>
			      	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
					<script>
					$(function(){
						$(".acl2").click(function(){
							if($(".acc2").is(":visible")){
								//if navigation is visible, hide it and remove "style" element that was added to take care of any specificity issues
								$(".acc2").slideUp("fast", function(){$(this).removeAttr("style")});
							}else{
								//if navigation is hidden show it
								$(".acc2").slideDown("fast");
							}
							return false;
						});
			        });
			        </script>
			        <div class="also_in">
			        	<h3 class="accordion-box-header"><div class="accordion-box-link"></div>Event calender</h3>
			        	<div id="eventCalendarHumanDate"></div>
						<script>
							$(document).ready(function() {
								$("#eventCalendarHumanDate").eventCalendar({
									eventsjson: 'json/event.humanDate.json.php',
									jsonDateFormat: 'human',  // 'YYYY-MM-DD HH:MM:SS'
									//eventsLimit: 2
								});
							});
						</script>
			      	</div>
                											  			
                </div>
          	</div>

		</div>
	</div>
	
	<!-- Footer inserted here -->
	<?php include('footer.php'); ?>

</div>

	<?php include('footer_includes.php'); ?>

	<script src="js/jquery.eventCalendar.js" type="text/javascript"></script>
	<!--<script>
		$(document).ready(function() {
			var eventsInline = [{ "date": "1337594400000", "type": "meeting", "title": "Project A meeting", "description": "Lorem Ipsum dolor set", "url": "http://www.event1.com/" },{ "date": "1337677200000", "type": "demo", "title": "Project B demo", "description": "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", "url": "http://www.event2.com/" },{ "date": "1338897600000", "type": "meeting", "title": "Project A meeting", "description": "Lorem Ipsum dolor set", "url": "http://www.event1.com/" },{ "date": "1338885237000", "type": "demo", "title": "Project B demo", "description": "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", "url": "http://www.event2.com/" },{ "date": "1341750647000", "type": "meeting", "title": "Project A meeting", "description": "Lorem Ipsum dolor set", "url": "http://www.event1.com/" },{ "date": "1342614647000", "type": "demo", "title": "Project B demo", "description": "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", "url": "http://www.event2.com/" },{ "date": "1344515447000", "type": "meeting", "title": "Project A meeting", "description": "Lorem Ipsum dolor set", "url": "http://www.event1.com/" },{ "date": "1345033847000", "type": "demo", "title": "Project B demo", "description": "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", "url": "http://www.event2.com/" },{ "date": "1347712247000", "type": "meeting", "title": "Project A meeting", "description": "Lorem Ipsum dolor set", "url": "http://www.event1.com/" },{ "date": "1348230647000", "type": "demo", "title": "Project B demo", "description": "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", "url": "http://www.event2.com/" },{ "date": "1349094647000", "type": "meeting", "title": "Project A meeting", "description": "Lorem Ipsum dolor set", "url": "http://www.event1.com/" },{ "date": "1351600247", "type": "demo", "title": "Project B demo", "description": "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.", "url": "http://www.event2.com/" }];

			$("#eventCalendarInline").eventCalendar({
				jsonData: eventsInline
			});
		});
	</script> -->

</body>
</html>