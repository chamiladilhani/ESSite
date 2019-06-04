<?php  include('header_includes.php'); 

$lecturer = new Lecturer();
$user = new User();

if(isset($_GET['did']))
{
	$lecturer->deleteLecturer($_GET['did']);	
	redirect('admin-lecturer-manage.php');
				
}

if (isset($_GET['cid'])) {
	
	$lconfirm = $lecturer->getLecturerDetailsToEvent($_GET['cid']);
	if ($lconfirm) {

		$base_url='http://localhost/ES-site/';
		$activation = $lconfirm->activation;
		$to = $lconfirm->email;

		//include 'smtp/Send_Mail.php';
	    //$subject="Lecturer verification";
	    //$body='Hi '.$lconfirm->fname.', <br/> <br/>Thanks for registering with us. We accept your request. Please verify your email and get started using your account. <br/> <br/> <a href="'.$base_url.'activation.php?code='.$activation.'">'.$base_url.'activation.php?code='.$activation.'</a>';
	    //Send_Mail($to,$subject,$body);

	    $headers = 'From: masswebster@gmail.com' . "\r\n" .
                   'Reply-To: masswebster@gmail.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $to=$to;
        $subject="ES-Site - Lecturer verification";            
        $message = 'Hi,<br/><br/>';
        $message .= 'Thanks for registering with us. We accept your request. Please verify your email and get started using your account. <br/> <br/>';
        $message .= '<a href="'.$base_url.'activation.php?code='.$activation.'">'.$base_url.'activation.php?code='.$activation.'</a><br/><br/>';
        $message .= 'ES-Site Team';
        mail($to,$subject,$message,$headers);

	    $lecturer->sendLecturer($_GET['cid']);
	}	

    redirect('admin-lecturer-manage.php');
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
			.defult_a_style{
				text-decoration: none !important;color:#FFFFFF !important;

			}
	</style>

	<!-- Core CSS File. The CSS code needed to make eventCalendar works -->
	<link rel="stylesheet" href="css/eventCalendar.css">

	<!-- Theme CSS file: it makes eventCalendar nicer -->
	<link rel="stylesheet" href="css/eventCalendar_theme_responsive.css">

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
            	<a href="index.php">Home</a> &raquo; <a href="admin-panel.php">Administrator</a> &raquo; Lecturer
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
                	<h3 style="text-align:center;background:#42B8DD"><span style="color:#fff" class="contactJobtitle">Manage Lecturers</span></h3>
            		
            		<div class="section group" style="background:#DDD;">
	            		<div class="col span_4_of_4">
	            			<div style="padding:0 10px;width:93%;margin:0 auto;">
	            			<h3><span style="color:#555;" class="contactJobtitle">Existing List</span></h3>
	            			<?php
								$userList = $lecturer->getLecturer();
								
								if($userList){
									echo '
									<table class="pure-table">
									    <thead>
									        <tr>
									            <th style="text-align:center">ID</th>
									            <th style="text-align:center">Name</th>
									            <th style="text-align:center">Industry Category</th>
									            <th style="text-align:center">Education Level</th>
									            <th style="text-align:center">Confirm</th>
									            <th></th>
									        </tr>
									    </thead>

									    <tbody>
									';
									foreach($userList as $singleUser){
											
										$singleUser = (object)$singleUser;
											
										echo '
											<tr class="pure-table-odd">
									            <td style="text-align:center">'.$singleUser->id.'</td>
									            ';
									            $geteligibility = $user->getEligibleName($singleUser->education_level);
									            $getsubject = $user->getSubjectName($singleUser->industry_category);
									            echo '
									            <td>'.$singleUser->fname.' '.$singleUser->lname.'</td>
									            <td>'.$getsubject->name.'</td>
									            <td>'.$geteligibility->name.'</td>
									            <td>
									            ';
									            	if ($singleUser->status == '0' && $singleUser->admin_confirm == '') {
									            		echo '
									            			<a onClick="return checkMeok()" href="admin-lecturer-manage.php?cid='.$singleUser->id.'" class="defult_a_style button-success button-xsmall pure-button">Confirm</a>
									            		';
									            	}
									            	elseif($singleUser->status == '0' && $singleUser->admin_confirm == 'Sent'){
									            		echo '
									            			<a class="defult_a_style button-success button-xsmall pure-button">Sent</a>
									            		';
									            	}
									            	elseif($singleUser->status == '1' && $singleUser->admin_confirm == 'Sent'){
									            		echo '
									            			<a class="defult_a_style button-warning button-xsmall pure-button">Confirmed</a>
									            			<a href="admin-timetable.php?tid='.$singleUser->id.'" style="float: left;margin-top:5px;" class="defult_a_style button-secondary button-xsmall pure-button">Time table</a>
									            		';
									            	}
									            echo '	
									            </td>
									            <td>
									            	<a onClick="return checkMe()" title="Delete" href="admin-lecturer-manage.php?did='.$singleUser->id.'"><img src="img/icons/delete.png"></a>
									            	
									            </td>
									        </tr>
										';
									}
									echo '
										 </tbody>
									</table>
									';
								}
								else{
									echo '
										 <pre style="background:#42B8DD;color:#FFFFFF;padding:5px;text-align:center;">No Lecturers Available.</pre>
									';
								}
							?>	     
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

	<script src="js/jquery.eventCalendar.js"></script>
	<script src="ajax-js-files/usergroup-add-validation.js"></script>

</body>
</html>