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
			input[type="checkbox"]{margin-top: 0 !important;}
			input[type="date"]:disabled{background-color:#ddd;}
			select:disabled{background-color:#ddd;}

	</style>

	<!-- Core CSS File. The CSS code needed to make eventCalendar works -->
	<link rel="stylesheet" href="css/eventCalendar.css">

	<!-- Theme CSS file: it makes eventCalendar nicer -->
	<link rel="stylesheet" href="css/eventCalendar_theme_responsive.css">

	<link href="css/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" /></link>

	<?php include('header.php'); ?>

</head>

<body>

<div id="wrapper">

	<div id="headcontainer">
		<?php include('top.php'); ?>
	</div>

	<div id="maincontentcontainer" class="s_contact">
		<div id="maincontent">

			<div class="breadcrumb">
            	<a href="index.php">Home</a> &raquo; <a href="admin-panel.php">Administrator</a> &raquo; Reports
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
                	<h3 style="text-align:center;background:#42B8DD"><span style="color:#fff" class="contactJobtitle">reports</span></h3>
            		<div class="section group" style="background:#DDD;">
	            		<div class="col span_4_of_4">
	            			<div style="padding:0 10px;width:93%;margin:0 auto;">															        

							        <div id="control-panel" class="section group" style="border:1px solid #aaa;width:auto;padding:5px 10px; margin-bottom:10px;background:#eee">
							        	<div class="col span_1_of_4">
							        		Event <input class="trigger" data-rel="event-panel" style="margin-top: 0;" id="report" name="report" value="event" type="radio">
							        	</div>
							        	<div class="col span_1_of_4">
							        		Lecturer <input class="trigger" data-rel="lecturer-panel" style="margin-top: 0;" id="report" name="report" value="lecturer" type="radio"> 
							        	</div>
							        	<div class="col span_1_of_4">
							        		Deleget <input class="trigger" data-rel="deleget-panel" style="margin-top: 0;" id="report" name="report" value="deleget" type="radio"> 
							        	</div>
							        	<div class="col span_1_of_4">
							        		Staff <input class="trigger" data-rel="staff-panel" style="margin-top: 0;" id="report" name="report" value="staff" type="radio"> 
							        	</div>
							        </div>

							    <form id="EventForm" method="post">  							      
							        <div class="section group event-panel content" style="display: none;border:1px solid #aaa;width:auto;padding:5px 10px; margin-bottom:10px;background:#eee">							        	
							        	<div class="section group">
							        		<h3><span style="color:#555;" class="contactJobtitle">Event</span></h3>
							        	</div>
							        	<div class="section group">
								        	<div class="col span_1_of_5">
								                <input onclick="checkDate()" id="checkdate" name="checkdate" type="checkbox"> Reports
								            </div>
								            <div class="col span_2_of_5">
								                From
								                <input id="first-name" disabled="disabled" name="fromdate" id="fromdate" class="datepicker" type="date">
								            </div>
								            <div class="col span_2_of_5">
								                To
								                <input id="last-name" disabled="disabled" name="todate" id="todate" class="datepicker" type="date">
								            </div>
								        </div>
							        	<div class="section group">
							        		<div class="col span_1_of_4">
								                <label><input style="margin-top: 0;" onclick="checkel()" id="el" type="checkbox"> Lecturer</label>
								                <select disabled="disabled" id="eLecturer" name="eLecturer" class="el">
								                    <option value="">Select</option>
								                    <?php 
														$role = new Lecturer();
														echo array2dropdown($role->getLecturerDropDown());
													?>
								                </select>
								            </div>
								            <div class="col span_1_of_4">
								                <label><input style="margin-top: 0;" onclick="checkes()" id="es" type="checkbox"> Subject category</label>
								                <select disabled="disabled" id="eSubject" name="eSubject" class="es">
								                    <option value="">Select</option>
								                    <?php 
														$role = new User();
														echo array2dropdown($role->getSubjectDropDown());
													?>
								                </select>
								            </div>
								            <div class="col span_1_of_4">
								                <label><input style="margin-top: 0;" onclick="checkee()" id="ee" type="checkbox"> Eligibility</label>
								                <select disabled="disabled" id="eEligibility" name="eEligibility" class="ee">
								                    <option value="">Select</option>
								                    <?php 
														$role = new User();
														echo array2dropdown($role->getEligibilityDropDown());
													?>
								                </select>
								            </div>
								            <div class="col span_1_of_4">
								                <label><input style="margin-top: 0;" onclick="checkelo()" id="elo" type="checkbox"> Location</label>
								                <select disabled="disabled" id="eLocation" name="eLocation" class="elo">
								                    <option value="">Select</option>
								                    <?php 
														$role = new User();
														echo array2dropdown($role->getLocationDropDown());
													?>
								                </select>
								            </div>
							        	</div>
							        	<div class="section group">
							        		<div class="col span_3_of_4">
							        			<label><input style="margin-top: 0;" onclick="checkeEall()" id="eall" name="allEvent" value="allEvent" type="checkbox"> All events</label>
							        		</div>
							        		<div class="col span_1_of_4">
							        			<button style="float:right;" type="submit" name="submitEvent" id="submitEvent" class="button-xsmall button-success pure-button">Ready to go</button>
							        		</div>							        		
							        	</div>	
							        </div>
							    </form>		

							    <form id="LecturerForm" method="post">
							        <div class="section group lecturer-panel content" style="display: none;border:1px solid #aaa;width:auto;padding:5px 10px; margin-bottom:10px;background:#eee">							        	
							        	<div class="section group">
							        		<h3><span style="color:#555;" class="contactJobtitle">Lecturer</span></h3>
							        	</div>
							        	<div class="section group">
							        		<div class="col span_1_of_3">
								                <label><input style="margin-top: 0;" onclick="checkLn()" id="ln" type="checkbox"> Name</label>
								                <select disabled="disabled" id="lName" name="lName" class="ln">
								                    <option value="">Select</option>
								                    <option value="all">All</option>
								                    <?php 
														$role = new Lecturer();
														echo array2dropdown($role->getLecturerDropDown());
													?>
								                </select>
								            </div>
								            <div class="col span_1_of_3">
								                <label><input style="margin-top: 0;" onclick="checkLs()" id="ls" type="checkbox"> Subject category</label>
								                <select disabled="disabled" id="lSubject" name="lSubject" class="ls">
								                    <option value="">Select</option>
								                    <?php 
														$role = new User();
														echo array2dropdown($role->getSubjectDropDown());
													?>
								                </select>
								            </div>
								            <div class="col span_1_of_3">
								                <label><input style="margin-top: 0;" onclick="checkLe()" id="le" type="checkbox"> Eligibility</label>
								                <select disabled="disabled" id="lEligibility" name="lEligibility" class="le">
								                    <option value="">Select</option>
								                    <?php 
														$role = new User();
														echo array2dropdown($role->getEligibilityDropDown());
													?>
								                </select>
								            </div>
							        	</div>
							        	<div class="section group">
							        		<button style="float:right;" type="submit" name="submitLecturer" id="submitLecturer" class="button-xsmall button-success pure-button">Ready to go</button>
							        	</div>	
							        </div>
							    </form>

							    <form id="delegetForm" method="post">
							        <div class="section group deleget-panel content" style="display: none;border:1px solid #aaa;width:auto;padding:5px 10px; margin-bottom:10px;background:#eee">							        	
							        	<div class="section group">
							        		<h3><span style="color:#555;" class="contactJobtitle">Deleget</span></h3>
							        	</div>
							        	<div class="section group">
							        		<div class="col span_3_of_4">
							        			<label><input style="margin-top: 0;" onclick="checkDall()" id="dall" name="allDeleget" value="allDeleget" type="checkbox"> All Delegets</label>
							        		</div>
							        	</div>							        		
							        	<div class="section group">
							        		<div class="col span_1_of_3">
								                <label><input style="margin-top: 0;" onclick="checkDe()" id="de" type="checkbox"> Event</label>
								                <select disabled="disabled" id="dEvent" name="dEvent" class="de">
								                    <option value="">Select</option>
								                    <?php 
														$role = new User();
														echo array2dropdown($role->getEventDropDown());
													?>
								                </select>
								            </div>
								            <div class="col span_1_of_3">
								                <label><input style="margin-top: 0;" onclick="checkDs()" id="ds" type="checkbox"> Subject category</label>
								                <select disabled="disabled" id="dSubject" name="dSubject" class="ds">
								                    <option value="">Select</option>
								                    <?php 
														$role = new User();
														echo array2dropdown($role->getSubjectDropDown());
													?>
								                </select>
								            </div>
								            <div class="col span_1_of_3">
								                <label><input style="margin-top: 0;" onclick="checkDel()" id="del" type="checkbox"> Eligibility</label>
								                <select disabled="disabled" id="dEligibility" name="dEligibility" class="del">
								                    <option value="">Select</option>
								                    <?php 
														$role = new User();
														echo array2dropdown($role->getEligibilityDropDown());
													?>
								                </select>
								            </div>
							        	</div>
							        	<div class="section group">
							        		<button style="float:right;" type="submit" name="submitDeleget" id="submitDeleget" class="button-xsmall button-success pure-button">Ready to go</button>
							        	</div>	
							        </div>
							    </form>

							    <form id="staffForm" method="post">
							        <div class="section group staff-panel content" style="display: none;border:1px solid #aaa;width:auto;padding:5px 10px; margin-bottom:10px;background:#eee">							        	
							        	<div class="section group">
							        		<h3><span style="color:#555;" class="contactJobtitle">Staff</span></h3>
							        	</div>
							        	<div class="section group">
							        		<div class="col span_1_of_3">
								                <label><input style="margin-top: 0;" onclick="checkSr()" id="sr" type="checkbox"> Role</label>
								                <select disabled="disabled" id="sRole" name="sRole" class="sr">
								                    <option value="">Select</option>
								                    <?php 
														$role = new User();
														echo array2dropdown($role->getUserGroupDropDown());
													?>
								                </select>
								            </div>
							        	</div>	
							        	<div class="section group">
							        		<button style="float:right;" type="submit" name="submitStaff" id="submitStaff" class="button-xsmall button-success pure-button">Ready to go</button>
							        	</div>
							        </div>
							    </form>								 

								<div class="section group">
									<div style="width:100%;overflow-x: auto;" id="eventTable"></div>
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

	<script src="js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script type="text/javascript">
		$( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
	</script>

	<script>
		$('.trigger').click(function() {
		    $('.content').hide();
		    $('.' + $(this).data('rel')).show();
		});
	</script>

	<script src="ajax-js-files/getStaffReport.js"></script>
	<script src="ajax-js-files/getDelegetReport.js"></script>
	<script src="ajax-js-files/getLecturerReport.js"></script>
	<script src="ajax-js-files/getEventReport.js"></script>

	<script>
	$(document).ready(function(){ 
		
	    $("input[name='report']").click(function() {	

		   	$("input[type='checkbox']").attr('checked', false);
	    	$("select").attr("disabled", "disabled");
	    	$("select option").attr('selected', false);
	        $("#eventTable").hide();

	        $("#ls").attr("disabled", "disabled");
			$("#le").attr("disabled", "disabled");
	    }); 
	});
	</script>

	<script>
		jQuery(".ln").on("change", function(){		

			var val = $(this).val();

			if (val == "all") {
				$("#ls").removeAttr("disabled");
				$("#le").removeAttr("disabled");
			}
			else{
				$("#ls").attr("disabled", "disabled");
				$("#le").attr("disabled", "disabled");

				$("#ls").attr('checked', false);
				$("#le").attr('checked', false);

				$(".ls").attr("disabled", "disabled");
	    		$(".ls option").attr('selected', false);
	    		$(".le").attr("disabled", "disabled");
	    		$(".le option").attr('selected', false);
			}
		});
	</script>

	<script>
		//############## Event section here...
		function checkDate() {
		    if (($("#checkdate:checked").length) > 0) {
		        $(".datepicker").removeAttr("disabled");
		        //$("input#eall").attr('checked', false);
		    } else {
		        $(".datepicker").attr("disabled", "disabled");
		    }
		}
		function checkel() {
		    if (($("#el:checked").length) > 0) {
		        $(".el").removeAttr("disabled");
		        $("input#eall").attr('checked', false);
		    } else {
		        $(".el").attr("disabled", "disabled");
		        $('#eLecturer option').attr('selected', false);
		        $("#eventTable").hide();
		    }
		}
		function checkes() {
		    if (($("#es:checked").length) > 0) {
		        $(".es").removeAttr("disabled");
		        $("input#eall").attr('checked', false);
		    } else {
		        $(".es").attr("disabled", "disabled");
		        $('#eSubject option').attr('selected', false);
		        $("#eventTable").hide();
		    }
		}
		function checkee() {
		    if (($("#ee:checked").length) > 0) {
		        $(".ee").removeAttr("disabled");
		        $("input#eall").attr('checked', false);
		    } else {
		        $(".ee").attr("disabled", "disabled");
		        $('#eEligibility option').attr('selected', false);
		        $("#eventTable").hide();
		    }
		}
		function checkelo() {
		    if (($("#elo:checked").length) > 0) {
		        $(".elo").removeAttr("disabled");
		        $("input#eall").attr('checked', false);
		    } else {
		        $(".elo").attr("disabled", "disabled");
		        $('#eLocation option').attr('selected', false);
		        $("#eventTable").hide();
		    }
		}
		function checkeEall() {
		    if (($("#all:checked").length) > 0) {

		    } else {

		        $("input#el").attr('checked', false);
		        $("input#es").attr('checked', false);
		        $("input#ee").attr('checked', false);
		        $("input#elo").attr('checked', false);

		       	$("select").attr("disabled", "disabled");
		    	$("select option").attr('selected', false);
		        $("#eventTable").hide();
		    }
		}

		//############## Lecturer section here...
		function checkLn() {
		    if (($("#ln:checked").length) > 0) {
		        $(".ln").removeAttr("disabled");
		    } else {
		        $(".ln").attr("disabled", "disabled");
		        $('#lName option').attr('selected', false);
		        $("#eventTable").hide();

		        $("#ls").attr("disabled", "disabled");
				$("#le").attr("disabled", "disabled");

				$("#ls").attr('checked', false);
				$("#le").attr('checked', false);

				$(".ls").attr("disabled", "disabled");
	    		$(".ls option").attr('selected', false);
	    		$(".le").attr("disabled", "disabled");
	    		$(".le option").attr('selected', false);
		    }
		}
		function checkLs() {
		    if (($("#ls:checked").length) > 0) {
		        $(".ls").removeAttr("disabled");
		    } else {
		        $(".ls").attr("disabled", "disabled");
		        $('#lSubject option').attr('selected', false);
		        $("#eventTable").hide();
		    }
		}
		function checkLe() {
		    if (($("#le:checked").length) > 0) {
		        $(".le").removeAttr("disabled");
		    } else {
		        $(".le").attr("disabled", "disabled");
		        $('#lEligibility option').attr('selected', false);
		        $("#eventTable").hide();
		    }
		}

		//############## Deleget section here...
		function checkDall() {
		    if (($("#dall:checked").length) > 0) {

		    	$("input#de").attr('checked', false);
		        $(".de option").attr('selected', false);
		        $(".de").attr("disabled", "disabled");

		        $("input#ds").attr('checked', false);
		        $(".ds option").attr('selected', false);
		        $(".ds").attr("disabled", "disabled");

		        $("input#del").attr('checked', false);
		        $(".del option").attr('selected', false);
		        $(".del").attr("disabled", "disabled");

		        $("#eventTable").hide();

		    } else {
		        

		       	$("select").attr("disabled", "disabled");
		    	$("select option").attr('selected', false);
		        $("#eventTable").hide();
		    }
		}
		function checkDe() {
		    if (($("#de:checked").length) > 0) {
		        $(".de").removeAttr("disabled");

		        $(".ds option").attr('selected', false);
		        $(".ds").attr("disabled", "disabled");
		        $("#ds").attr('checked', false);

		        $(".del option").attr('selected', false);
		        $(".del").attr("disabled", "disabled");
		        $("#del").attr('checked', false);

		        $("input#dall").attr('checked', false);

		    } else {
		        $(".de").attr("disabled", "disabled");
		        $('#dEvent option').attr('selected', false);
		        $("#eventTable").hide();
		    }
		}
		function checkDs() {
		    if (($("#ds:checked").length) > 0) {
		        $(".ds").removeAttr("disabled");

		        $(".de option").attr('selected', false);
		        $(".de").attr("disabled", "disabled");
		        $("#de").attr('checked', false);

		        $(".del option").attr('selected', false);
		        $(".del").attr("disabled", "disabled");
		        $("#del").attr('checked', false);

		        $("input#dall").attr('checked', false);

		    } else {
		        $(".ds").attr("disabled", "disabled");
		        $('#dSubject option').attr('selected', false);
		        $("#eventTable").hide();
		    }
		}
		function checkDel() {
		    if (($("#del:checked").length) > 0) {
		        $(".del").removeAttr("disabled");

		        $(".de option").attr('selected', false);
		        $(".de").attr("disabled", "disabled");
		        $("#de").attr('checked', false);

		        $(".ds option").attr('selected', false);
		        $(".ds").attr("disabled", "disabled");
		        $("#ds").attr('checked', false);

		        $("input#dall").attr('checked', false);

		    } else {
		        $(".del").attr("disabled", "disabled");
		        $('#dSubject option').attr('selected', false);
		        $("#eventTable").hide();
		    }
		}

		//############## Staff section here...
		function checkSr() {
		    if (($("#sr:checked").length) > 0) {
		        $(".sr").removeAttr("disabled");
		    } else {
		        $(".sr").attr("disabled", "disabled");
		        $('#sRole option').attr('selected', false);
		        $("#eventTable").hide();
		    }
		}
	</script>	

</body>
</html>