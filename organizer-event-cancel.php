<?php  include('header_includes.php'); 

$user = new User();
$lecturer = new Lecturer();

if (isset($_REQUEST['eid'])) {
	$details = $user->getEventDetails($_REQUEST['eid']);
}

if (isset($_POST['send'])) {

	//$mailadds = $user->getEventsAttends($_POST['event_id']);	

	//$contacts = (array)$mailadds;

	//foreach($contacts as $contact) {

	//	include 'smtp/Send_Mail.php';
	//	$to      =  $contact;
	//	$subject = $_POST['subject'];
	//	$body = $_POST['contents'];
		//Send_Mail($to,$subject,$body);

	//}

	//header("Location:organizer-event-manage.php");
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
	</style>


</head>

<body>

<div id="wrapper">

	<div id="headcontainer">
		<?php include('top.php'); ?>
	</div>

	<div id="maincontentcontainer" class="s_contact">
		<div id="maincontent">

			<div class="breadcrumb">
            	<a href="index.php">Home</a> &raquo; <a href="organizer-panel.php">Organizer</a> &raquo; <a href="organizer-event-manage.php">Manage</a> &raquo; Cancel <a href="event-more.php?eid=<?php echo $details->id; ?>"><?php echo $details->ename; ?></a>
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
                	<h3 style="text-align:center;background:#42B8DD"><span style="color:#fff" class="contactJobtitle">Event Cancellation</span></h3>
            		<div class="section group" style="background:#DDD;">
	            		<div class="col span_4_of_4">
	            			<div style="padding:0 10px;width:93%;margin:0 auto;">
								<form id="eventCancelForm" action="" method="post" enctype="multipart/form-data">
									
			                        <div class="section group" style="background:#DDD;">			                        	
	            						<div class="col span_1_of_3">
	            						<label for="">Event ID</label> 					                         
					                        <input type="text" style="background:#eee" disabled="disabled" id="" name="" value="<?php echo $details->id; ?>" required placeholder="Please enter tile">
					                    </div>
					                    <div class="col span_2_of_3">
					                    <label for="">Event Name</label> 
					                    	<input type="text" style="background:#eee" disabled="disabled" id="" name="" value="<?php echo $details->ename; ?>" required placeholder="Please enter tile">
					                    </div>
					                </div>

			                        <p><label for="">Cancellation Note <i>*</i></label>
                        			<textarea id="cancel_note" name="cancel_note" tabindex="5" required></textarea></p>

                        			<div style="display:none;margin-bottom:10px;" id="sent-form-msg" class="success-box alert">
										Event cancelled.						
										<a class="toggle-alert" href="#">Toggle</a>
									</div>
									<div style="display:none;margin-bottom:10px;" id="error-form-msg" class="error-box alert">
										Sorry, something goes wrong.					
										<a class="toggle-alert" href="#">Toggle</a>
									</div>
                        	                 
			                        <input type="hidden" value="<?php echo $_REQUEST['eid']; ?>" name="event_id">
			                        <button type="submit" name="cancelEvent" id="cancelEvent" class="button-secondary pure-button">Cancel</button>
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

	<script src="js/jquery.eventCalendar.js" type="text/javascript"></script>	

	<script src="ajax-js-files/event-cancel-validation.js"></script>

</body>
</html>