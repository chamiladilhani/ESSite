<?php  include('header_includes.php'); 

$usr = new User();


if (isset($_GET['rol']) && $_GET['rol']=='deleget') {
	$role = new Deleget();
	$details = $role->getDelegetDetailsPro($_GET['delid']);
}
elseif(isset($_REQUEST['pid'])){
	$lecturerPro = new Lecturer();
	$details = $lecturerPro->getLecturerDetailsPro($_REQUEST['pid']);
}
else{
	if ($_SESSION['role'] == 'Administrator' || $_SESSION['role'] == 'Organizer' || $_SESSION['role'] == 'Support') {
		$role = new User();
		$details = $role->getUserDetails();
	}
	elseif ($_SESSION['role'] == 'Lecturer') {
		$role = new Lecturer();
		$details = $role->getLecturerDetails();
	}
	else{
		$role = new Deleget();
		$details = $role->getDelegetDetails();
	}
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

			<div class="section group">
				<h1>Profile</h1>
                <div class="col span_3_of_4 content_aside" style="margin-left:0;">
                <div class="section group">
                	<div class="proList">
	                    <ul>
							
                            <li>
                            	<?php
                            		if ($details->full_img) {
                            			echo '<img class="proImg defult_pro_img" src="uploads/profile/'.$details->full_img.'">';
                            		}
                            		else{
                            			echo '<img class="proImg" src="uploads/profile/testp.png">';
                            		}

                            	?>                           	

	                            <div class="proDetails">
	                                <span class="proTitle"><?php echo $details->fname.' '.$details->lname ?> </span>
	                                <?php
	                                if (!isset($_GET['delid'])) {
	                                	if (isset($_REQUEST['pid']) or $_SESSION['role'] == 'Lecturer') {
	                                		echo '
	                                			<p class="contactJobtitle">'.$details->company_designation.'</p>
	                                			<p class="contactJobtitle" style="color:#555">@ '.$details->company_name.'</p>
	                                		';
	                                	}
	                                	elseif (isset($_REQUEST['pid']) or $_SESSION['role'] == 'Administrator') {
	                                		echo '
	                                			<p class="contactJobtitle">Administrator</p>
	                                			<p class="contactJobtitle" style="color:#555">@ ES-Site</p>
	                                		';
	                                	}
	                                	elseif (isset($_REQUEST['pid']) or $_SESSION['role'] == 'Organizer') {
	                                		echo '
	                                			<p class="contactJobtitle">Organizer</p>
	                                			<p class="contactJobtitle" style="color:#555">@ ES-Site</p>
	                                		';
	                                	}
	                                	elseif (isset($_REQUEST['pid']) or $_SESSION['role'] == 'Support') {
	                                		echo '
	                                			<p class="contactJobtitle">Support</p>
	                                			<p class="contactJobtitle" style="color:#555">@ ES-Site</p>
	                                		';
	                                	}
	                                }
	                                ?> 
	                                <?php 
	                                	if (isset($_REQUEST['pid']) or isset($_GET['delid']) or $_SESSION['role'] == 'Lecturer' or $_SESSION['role'] == 'Deleget') {

	                                		$geteligibility = $usr->getEligibleName($details->education_level);
											$getsubject = $usr->getSubjectName($details->industry_category);

	                                		echo '
	                                			<p class="contactJobtitle" style="color:#77A22F">'.$geteligibility->name.' - '.$getsubject->name.'</p>
	                                		';
	                                	}
	                                ?>
	                                <?php 
	                                	if (isset($_REQUEST['pid']) or $_SESSION['role'] == 'Lecturer') {
	                                		echo '
	                                			<span style="font-size:11px;" class="proAddress">'.$details->a_no.', '.$details->a_street.'<br />'.$details->a_city.'<br />'.$details->a_country.'<br /></span>
	                                		';
	                                	}
	                                ?>                                 
	                            </div>
	                            
	                            <div class="proContact">
	                            <?php 
                                	if (isset($_REQUEST['pid']) or $_SESSION['role'] == 'Lecturer' or $_SESSION['role'] == 'Deleget') {
                                		echo '
                                			<span class="proWebsite"><img src="img/icons/icon-tel.png" width="14" height="13" alt="Tel"> '.$details->contact.'</span>
                                		';
                                	}
                                ?>
	                            <span class="proEmail"><img src="img/icons/icon-email.png" width="14" height="12" alt="Email"> <a href="mailto:<?php echo $details->email ?>"><?php echo $details->email ?></a></span>
	                            <!--<span class="proWebsite"><img src="img/icons/icon-web.png" width="14" height="14" alt="Web"> <a href="#">http://www.chinthana's.com/</a></span>-->
	                            </div>

                            </li>
	                        
	                    </ul>
	                </div>
	            </div>

	            <?php 
	            if(isset($_REQUEST['pid'])){
	            	$rate = $usr->getLecturerRatings($_REQUEST['pid']);
	            	$rate1 = $usr->getLecturerCount($_REQUEST['pid']);
		           	echo '
			            <div class="section group">
		                	<div style="float:left;margin-right:10px;" class="rateit" data-rateit-readonly="true" data-eventid="" data-rateit-value="'.$rate.'"></div>
		                    <p style="color:#aaa;font-size:12px;">Rating: '.$rate.' - ‎'.$rate1.' votes</p>
		                </div>
	                ';
                } 
		        elseif($_SESSION['role'] == 'Lecturer') {				

					$rate = $usr->getLecturerRatings($_SESSION['uid']);
	            	$rate1 = $usr->getLecturerCount($_SESSION['uid']);
		            echo '
		            	<div class="section group">
		                	<div style="float:left;margin-right:10px;" class="rateit" data-rateit-readonly="true" data-eventid="" data-rateit-value="'.$rate.'"></div>
		                    <p style="color:#aaa;font-size:12px;">Rating: '.$rate.' - ‎'.$rate1.' votes</p>
		                </div>
		            ';
                }
                ?>

	            <div class="section group">
		        	<div class="col span_2_of_2">
		        		<?php
		        		if (isset($_REQUEST['pid']) || $_SESSION['role'] == 'Lecturer') {

		        			if ($details->summary) {
		        				echo '
			        				<div class="subpagefeature" style="margin-bottom:20px;">
					                	<h5>Summery</h5>
					                    <p class="abstract">'.$details->summary.'</p>
					                </div>
				                ';
		        			}

		        			echo '
		        			<div class="section group">
		        				<div class="col span_1_of_3">
		        			';

							if ($details->experience){

		        				$lectExperience =   explode( ',', $details->experience );
		        				
		        				echo '	        					
			        				<div class="subpagefeature">
					                	<h5>Experience</h5>
					                    <ul style="margin-bottom:10px">
					                	';

					                foreach($lectExperience as $result) {

								    	echo '<li>'.$result.'</li>';

									}	

			                    echo '
			                    		</ul>
					                </div>
		        				';
		        			}

		        			echo '
		        				</div>
		        				<div class="col span_1_of_3">
		        			';

		        			if ($details->skills){

		        				$lectSkills =   explode( ',', $details->skills );
		        				
		        				echo '	        					
			        				<div class="subpagefeature">
					                	<h5>Skills</h5>
					                    <ul style="margin-bottom:10px">
					                	';

					                foreach($lectSkills as $result) {

								    	echo '<li>'.$result.'</li>';

									}	

			                    echo '
			                    		</ul>
					                </div>
		        				';
		        			}

		        			echo '
		        				</div>
		        				<div class="col span_1_of_3">
		        			';

		        			if ($details->membership){

		        				$lectMembership =   explode( ',', $details->membership );
		        				
		        				echo '	        					
			        				<div class="subpagefeature">
					                	<h5>Membership</h5>
					                    <ul style="margin-bottom:10px">
					                	';

					                foreach($lectMembership as $result) {

								    	echo '<li>'.$result.'</li>';

									}	

			                    echo '
			                    		</ul>
					                </div>
		        				';
		        			}

		        			echo '
		        				</div>
		        			</div>
		        			';
		        		}
		                ?>
	                </div>
		          </div>
                </div>

                <div class="col span_1_of_4 pg_aside">
                	
                		<?php if(!isset($_GET['delid'])){ ?>
							<?php if(isset($_REQUEST['pid'])) { if(isset($_SESSION['uid'])){ if($_REQUEST['pid'] == $_SESSION['uid']){ ?>
							<div class="also_in">
				        	<h3 class="accordion-box-header"><div class="accordion-box-link acl2"></div>Also in this section</h3>
				        	<ul class="accordion-box-content acl1"> 
							<li>&rsaquo; <a href="profile-manage.php?mid=<?php echo $_REQUEST['pid'] ?>">Manage your profile</a></li>
							<li>&rsaquo; <a href="profileimageuploader.php">Change Profile Picture</a></li>
							</ul>
			      			</div>
							<?php } }}else{ ?>
							<div class="also_in">
				        	<h3 class="accordion-box-header"><div class="accordion-box-link acl2"></div>Also in this section</h3>
				        	<ul class="accordion-box-content acl1"> 
							<li>&rsaquo; <a href="profile-manage.php?mid=<?php echo $_SESSION['uid'] ?>">Manage your profile</a></li>
							<li>&rsaquo; <a href="profileimageuploader.php">Change Profile Picture</a></li>
							</ul>
			      			</div>
							<?php }  ?>
						<?php }  ?>							
			            
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

			        <?php if (isset($_SESSION['uid'])) { if ($_SESSION['role']=="Lecturer") { ?>
			        <div class="also_in">
			        	<h3 class="accordion-box-header"><div class="accordion-box-link"></div>Your Events</h3>
			        	<div id="eventCalendarHumanDate"></div>
						<script>
							$(document).ready(function() {
								$("#eventCalendarHumanDate").eventCalendar({
									eventsjson: 'json/lecturerevent.humanDate.json.php',
									jsonDateFormat: 'human',  // 'YYYY-MM-DD HH:MM:SS'
									//eventsLimit: 2
								});
							});
						</script>
			      	</div>
			      	<?php }} ?>
                </div>
          	</div>

		</div>

		<div id="infostrip">
	    	<div id="maincontent"  class="group">
	        
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