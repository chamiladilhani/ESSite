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

	<!-- Core CSS File. The CSS code needed to make eventCalendar works -->
	<link rel="stylesheet" href="css/eventCalendar.css">

	<!-- Theme CSS file: it makes eventCalendar nicer -->
	<link rel="stylesheet" href="css/eventCalendar_theme_responsive.css">

	<style type="text/css">
		.event_defult_style{
			position:absolute;background: #004A8D;padding:3px
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
			background-color:#5BC0DE !important;
			outline:1px solid #5BC0DE !important;
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

	<div id="maincontentcontainer" class="our_sbjt">
		<div id="maincontent">

			<div class="breadcrumb">
            	<a href="index.php">Home</a> &raquo; Subjects
            </div>

			<div class="section group">
			
                <div class="col span_3_of_4 content_aside">
                	<h1>Subjects</h1>
                        
                	<div class="proList">
                	<?php
						$sbtList = $usr->getSubject();
						
						if($sbtList){
							echo '
								<ul>
							';
							foreach($sbtList as $singleSubject){
									
								$singleSubject = (object)$singleSubject;
									
								echo '
									<li>
		                                <div style="70%:float:left;">
		                                	<h3><a style="color:#5BC0DE !important;text-decoration: underline; text-transform:uppercase;font-size:14px !important;">'.$singleSubject->name.'</a></h3>
		                        			
		                        			<table><tr><th style="width:15%;vertical-align:middle;text-align:right">Resource panel :</th><td width="85%">		                        ';

		                        $lecturerList = $usr->getLecturers($singleSubject->id);
		                        if($lecturerList){
		                        	foreach($lecturerList as $singleLecturer){
		                        		$singleLecturer = (object)$singleLecturer;

		                        		echo '<small style="float:left;margin:0 10px 5px 0;display: inline;white-space: nowrap;"><a style="color: #555;text-decoration:underline;" href="profile.php?pid='.$singleLecturer->id.'">'.$singleLecturer->fname.' '.$singleLecturer->lname.'</a></small>';
		                        	}
		                        }	    

		                        echo '</td></tr></table>
		                        			<table><tr><th style="width:15%;vertical-align:middle;text-align:right">Upcoming Events : </th><td width="85%">
		                        ';   

		                        $eventList = $usr->getSubjectEvents($singleSubject->id);
		                        if($eventList){
		                        	foreach($eventList as $singleEvent){
		                        		$singleEvent = (object)$singleEvent;

		                        		echo '<small style="float:left;margin:0 10px 5px 0;display: inline;white-space: nowrap;"><a style="color: #555;text-decoration:underline;" href="event-more.php?eid='.$singleEvent->id.'">'.$singleEvent->ename.' - '.$singleEvent->edate.'</a></small>';
		                        	}
		                        }

		                        echo ' 	</td></tr></table>	
		                        		</div>
	                                </li>
								';
							}
							echo '
								 </ul>
							';
						}
						else{
							echo '
								 <pre style="background:#F68026 ;color:#FFFFFF;padding:5px;text-align:center;">No details.</pre>
							';
						}
					?>  
                    </div>
                </div>

                <div class="col span_1_of_4 pg_aside">
                	<script src="js/jquery-1.7.2.min.js"></script>
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

</body>
</html>