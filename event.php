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
            	<a href="index.php">Home</a> &raquo; Events
            </div>

			<div class="section group">
				
                <div class="col span_3_of_4 content_aside" style="margin-left:0;">
                <h1>Events</h1>
                	<div class="section group">
	                	<link rel="stylesheet" href="css/flexslider2.css" type="text/css">
	                	<script src="js/jquery-1.7.2.min.js"></script>
	                	<script src="js/jquery.flexslider-min.js"></script>
	                    <script type="text/javascript" charset="utf-8">
	                    $(window).load(function() {
	                      $('.gallery').flexslider({
	                        slideshowSpeed: 5000,
	                        animationSpeed: 600
	                      });
	                    });
	                    </script>                        
	                    <div class="gallery">
	                    	<ul class="slides">
	                    		<li><img src="img/slider/38a.jpg"></li>
	                    		<li><img src="img/slider/38b.jpg"></li>
	                    		<li><img src="img/slider/38c.jpg"></li>
	                    		<li><img src="img/slider/38d.jpg"></li>
	                    	</ul>
	                    </div>
	                </div>

	                <div class="section group">
	                	<div class="col span_4_of_4">
		                    <ul class="news">
		                    	<?php
									$userList = $user->getEventsRow();
									
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
						                                
						                                    
						                                 echo '  
						                                 	</h3> 
						                                    <p style="margin-bottom:2px;">'.current(explode("\n", wordwrap($singleUser->edescription, 150, "...\n"))).'</p>
						                                    
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
											 <pre style="background:#004A8D;color:#FFFFFF;padding:5px;text-align:center;">No Recent Events.</pre>
										';
									}
								?>
		                    </ul>
		                </div>    
	                </div>

                </div>
                <div class="col span_1_of_4 pg_aside">
                	<div class="also_in">
			        	<h3 class="accordion-box-header"><div class="accordion-box-link acl2"></div>Also in this section</h3>
			        	<ul class="accordion-box-content acc2">
			            	
							<li>&rsaquo; <a href="event-past.php">Past events</a></li>
							
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
	<script src="js/jquery.flexslider-min.js"></script>
<!-- Hook up the FlexSlider -->
<script type="text/javascript">
  $(window).load(function() {
    $('.maincarousel').flexslider({
          animation: "fade",
          touch: true,
          controlNav: false
          
    });
	$('.testimonial-carousel').flexslider({
          animation: "fade",
          touch: true,
          controlNav: false,
		  directionNav: false
    });

  $('.flexslider').flexslider({
          animation: "fade",
          touch: true,
          controlNav: false
    });


  });


  (function () {

      var $window = $(window),
          flexslider;

      function getGridSize() {
          return (window.innerWidth < 600) ? 1 :
                 (window.innerWidth < 900) ? 2 : 2;
      }

      $window.load(function () {
          $('.clientscarousel').flexslider({
              animation: "slide",
              animationLoop: true,
              itemWidth: 210,
			  slideshowSpeed: 7000,
			  animationSpeed: 600,
              itemMargin: 0,
              minItems: getGridSize(), 
              maxItems: getGridSize() 
          });
      });

      // check grid size on resize event
      $window.resize(function () {
          var gridSize = getGridSize();

          flexslider.vars.minItems = gridSize;
          flexslider.vars.maxItems = gridSize;
      });
  });


</script>

<script>
var state = 'none';
	
	function showhide(layer_ref) {
	
	if (state == 'block') {
	state = 'none';
	$(".menuToggle").html("Show Menu / Navigation <img src='img/icon-navigation.png' width='23' height='13'>");
	}
	else {
	state = 'block';
	// Make the content div fade in
	$("#show_menu").hide();
	$('#show_menu').fadeIn(200);
	$('#show_menu').slideDown(200);
	
	$(".menuToggle").html("Close Menu / Navigation <img src='img/icon-closenav.png' width='13' height='13'>");
	}
	if (document.all) { //IS IE 4 or 5 (or 6 beta)
	eval( "document.all." + layer_ref + ".style.display = state");
	}
	if (document.layers) { //IS NETSCAPE 4 or below
	document.layers[layer_ref].display = state;
	}
	if (document.getElementById &&!document.all) {
	hza = document.getElementById(layer_ref);
	hza.style.display = state;
	}
	}

</script>

	<script src="js/jquery.eventCalendar.js" type="text/javascript"></script>
	

</body>
</html>