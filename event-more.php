<?php  //include('header_includes.php'); 

session_start();
include_once 'classes/db.class.php';
include_once 'classes/function.class.php';
include_once 'classes/user.class.php';
include_once 'classes/lecturer.class.php';

$user = new User();
$lecturer = new Lecturer();

if (isset($_REQUEST['eid'])) {
	$details = $user->getEventDetails($_REQUEST['eid']);
}

if(isset($_GET['bid']))
{
	$details = $user->getEventDetails($_GET['bid']);
	
	if ($details->no_of_seats > $details->booking) {
		$user->bookEvent($_GET['bid']);	
		redirect('event-more.php?eid='.$_GET['bid']);
	}
	else{ ?>
		<script type="text/javascript">
		   alert("Sorry, No seats available.");
		   history.back();
		</script>
	<?php }
				
}

if (isset($_GET['lid'])) {

	$user->leaveEvent($_GET['lid']);

	redirect('event-more.php?eid='.$_GET['lid']);
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

	<link rel="stylesheet" href="comment-css/example.css">
	<link rel="stylesheet" href="comment-css/style.css">

	<link type="text/css" rel="stylesheet" href="css/like&dislike.css">

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
	            <a href="index.php">Home</a> &raquo; <a href="event.php">Events</a> &raquo; <?php echo $details->ename; ?>
	        </div>	            
			<div class="section group">
                <div class="col span_3_of_4 content_aside">
					<h1><?php echo $details->ename; ?></h1>
                    <h4 class="newsdate"><?php echo date("j F Y", strtotime($details->edate)); ?></h4>
                    
                    <?php
                    	if ($details->cancel_note == "") {
		                    if ($details->full_img) {
								$image = $details->full_img;
							}
							else{
								$image = 'education-sky.png';
							}
						}
						else{
							$image = 'event-cancelled.jpg';
						}
					?>
					<div class="section group">						
						<div class="col span_2_of_2">
						 	<img style="width:50%;float:left;margin:0 10px 5px 0;" alt=" & NewsTitle & " src="uploads/events/<?php echo $image; ?>">
	                    	<p style="text-align:justify;">
	                    	<?php 
	                    		if ($details->cancel_note == "") {
	                    			echo $details->edescription; 
	                    		}
	                    		else{
	                    			echo '<b>NOTE : </b>'.$details->cancel_note; 
	                    		}
	                    	?>
	                    	</p>							
						</div>
					</div>    

					<div class="section group">
						<div class="col span_1_of_4">
							<?php
								$lecturerData = $lecturer->getLecturerDetailsToEvent($details->electurer);

			                    if ($lecturerData->full_img) {
									$lectImage = $lecturerData->full_img;
								}
								else{
									$lectImage = 'testp.png';
								}
							?>
							<h4>LECTURER </h4>
							<img class="mainImg" src="uploads/profile/<?php echo $lectImage; ?>">
                            <p class="contactTitle"><?php echo $lecturerData->fname.' '.$lecturerData->lname; ?></p>
                            <p class="contactJobtitle"><?php echo $lecturerData->company_designation; ?></p>

                            <?php $rate = $user->getRatings($_REQUEST['eid']); ?>

                            <?php $rate1 = $user->getCount($_REQUEST['eid']); ?>
                            <?php 
                            if (strtotime($details->edate) < strtotime(date('Y-m-d'))) {

                            	if (isset($_SESSION['role'])) {                            		

							    	if ($_SESSION['role'] == 'Deleget') {

							    		$user_eligibility = $user->getUserEligibility($_SESSION['uid']);

	                            		if ($details->eligibility_id == $user_eligibility->education_level) 
										{
											
											echo '<div class="rateit" data-lecturerid="'.$lecturerData->lecturer_id.'" data-eventid="'.$_REQUEST['eid'].'" data-rateit-value="'.$rate.'"></div>';
										}
										else
										{
											
											echo '<div class="rateit" data-rateit-readonly= "true" data-lecturerid="'.$lecturerData->lecturer_id.'" data-eventid="'.$_REQUEST['eid'].'" data-rateit-value="'.$rate.'"></div>';
										}
									}
									else
									{
										
										echo '<div class="rateit" data-rateit-readonly= "true" data-lecturerid="'.$lecturerData->lecturer_id.'" data-eventid="'.$_REQUEST['eid'].'" data-rateit-value="'.$rate.'"></div>';
									}
								}
								else{
									echo '<div class="rateit" data-rateit-readonly="true" data-eventid="" data-rateit-value="'.$rate.'"></div>';
								}

								echo '<p style="color:#aaa;font-size:12px;">Rating: '.$rate.' - ‎'.$rate1.' votes</p>';								
							}
							?>
                            
                        </div>
						<div class="col span_3_of_4">
							<table class="defult-table">
								<tr>
									<th>Date/Time </th>
									<td>
										<?php 
										if ($details->cancel_note == "") {
											echo date("F j, Y,", strtotime($details->edate)).' '.$details->ehour.':'.$details->eminute.' - '.$details->ehour_to.':'.$details->eminute_to; 
										}
										
										?>
									</td>
								</tr>
								<tr>
									<th>Location </th>
									<td>
										<?php 
										if ($details->cancel_note == "") {

											$getLoc = $user->getLocationName($details->elocation_id);

											if($getLoc){
												echo $getLoc->name; 
											}
										}	
																			
										?>
									</td>
								</tr>
								<tr>
									<th>Venue </th>
									<td>
										<?php 
										if ($details->cancel_note == "") {

											$getVenue = $user->getVenueName($details->evenue_no);

											if($getVenue){
												echo $getVenue->name; 
											}
										}
										
										?>
									</td>
								</tr>
								<tr>
									<th>Eligibility </th>
									<td>
										<?php 
										if ($details->cancel_note == "") {

											$geteligibility = $user->getEligibleName($details->eligibility_id);
											
											if($geteligibility){
												echo $geteligibility->name;
											}
										}
										
										?>
									</td>
								</tr>
								<tr>
									<th>Seats Available </th>
									<td>
										<?php 
										if ($details->cancel_note == "") {
											echo ($details->no_of_seats - $details->booking); 
										}
										
										?>
									</td>
								</tr>
								<tr>
									<th>Publish </th>
									<td>
										<?php 
										if ($details->cancel_note == "") {
											echo date("F j, Y, g:i a",strtotime($details->publish_date)); 
										}
										
										?>
									</td>
								</tr>
								<tr>
									<th>Organized by </th>
									<td>
										<?php 
										if ($details->cancel_note == "") {
											echo $details->o_by;
										}
										
										?>
									</td>
								</tr>
							</table>
							<?php 
						    	if (isset($_SESSION['uid'])) {

						    		$booking = $user->getBookingDetails($details->id);

						    		if(!(strtotime($details->edate) < strtotime(date('Y-m-d')))){

						    			if ($details->cancel_note == "") {

						    				if ($_SESSION['role'] == 'Deleget') {

							    				$user_eligibility = $user->getUserEligibility($_SESSION['uid']);

							    				if ($details->eligibility_id == $user_eligibility->education_level) {

										    		if ($booking) {
										    			echo '
											    			<a href="event-more.php?lid='. $details->id.'" class="defult_a_style button-warning pure-button">Leave Event</a>
											    		';
										    		}
										    		else{
										    			echo '
											    			<a href="event-more.php?bid='. $details->id.'" class="defult_a_style button-secondary pure-button">Book your seat</a>
											    		';
										    		}
										    	}
										    	else{
										    		echo '
											    			<a class="defult_a_style button-secondary pure-button">You are not eligible for attend</a>
											    		';
										    	}
										    }
								    	}	
							    	}					    		
						    	}
						    ?>							
						</div>
					</div>	

					<div class="section group">

						<?php
					        $mysql_host = "localhost";
					        $mysql_database = "es-db";
					        $mysql_user = "root";
					        $mysql_password = "";

					        $db = mysql_connect($mysql_host,$mysql_user,$mysql_password);
					        mysql_connect($mysql_host,$mysql_user,$mysql_password);
					        mysql_select_db($mysql_database);

							$eventID = $_REQUEST['eid']; // The ID of the page, the article or the video ...

					        if(isset($_SESSION['uid'])){
						        
							    $user_id = $_SESSION['uid'];					        

						        // check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
						        $dislike_sql = mysql_query('SELECT COUNT(*) FROM  event_rate WHERE id_user = "'.$user_id.'" and id_event = "'.$eventID.'" and rate = 2 ');
						        $dislike_count = mysql_result($dislike_sql, 0); 

						        $like_sql = mysql_query('SELECT COUNT(*) FROM  event_rate WHERE id_user = "'.$user_id.'" and id_event = "'.$eventID.'" and rate = 1 ');
						        $like_count = mysql_result($like_sql, 0);  

					        }

					        // count all the rate 
					        $rate_all_count = mysql_query('SELECT COUNT(*) FROM  event_rate WHERE id_event = "'.$eventID.'"');
					        $rate_all_count = mysql_result($rate_all_count, 0);  

					        $rate_like_count = mysql_query('SELECT COUNT(*) FROM  event_rate WHERE id_event = "'.$eventID.'" and rate = 1');
					        $rate_like_count = mysql_result($rate_like_count, 0);  
					        //$rate_like_percent = percent($rate_like_count, $rate_all_count);
					        if ($rate_like_count != 0) {
					        	$count1 = $rate_like_count / $rate_all_count;
					            $count2 = $count1 * 100;
					            $count = number_format($count2, 0);
					            $rate_like_percent = $count;
					        }					        

					        $rate_dislike_count = mysql_query('SELECT COUNT(*) FROM  event_rate WHERE id_event = "'.$eventID.'" and rate = 2');
					        $rate_dislike_count = mysql_result($rate_dislike_count, 0);  
					        //$rate_dislike_percent = percent($rate_dislike_count, $rate_all_count);
					        if ($rate_dislike_count != 0) {
						        $count1 = $rate_dislike_count / $rate_all_count;
					            $count2 = $count1 * 100;
					            $count = number_format($count2, 0);
					            $rate_dislike_percent = $count;
					        }
					    ?>

					    <script>
					        $(function(){ 
					            var eventID = <?php echo $eventID;  ?>; 

					            $('.like-btn').click(function(){
					                $('.dislike-btn').removeClass('dislike-h');    
					                $(this).addClass('like-h');
					                $('.stat-cnt').hide();
					                $.ajax({
					                    type:"POST",
					                    url:"ajax-like-dislike.php",
					                    data:'act=like&eventID='+eventID,					                    
					                    success: function(html){
				                        	$('.stat-cnt').hide('fast');
				                            $('#rate-me').before(html);
					                    } 
					                });
					            });
					            $('.dislike-btn').click(function(){
					                $('.like-btn').removeClass('like-h');
					                $(this).addClass('dislike-h');
					                $('.stat-cnt').hide();
					                $.ajax({
					                    type:"POST",
					                    url:"ajax-like-dislike.php",
					                    data:'act=dislike&eventID='+eventID,
					                    success: function(html){
				                        	$('.stat-cnt').hide('fast');
				                            $('#rate-me').before(html);  
					                    }
					                });
					            });
					            $('.share-btn').click(function(){
					                $('.share-cnt').toggle();
					            });
					        });
					    </script>
					    <?php if(strtotime($details->edate) < strtotime(date('Y-m-d'))){ ?>	
						<div class="tab-cnt">        
					        <div class="tab-tr" id="t1">
					        	<?php if (isset($_SESSION['uid'])) { if($_SESSION['role'] == 'Deleget'){ 

					        		$user_eligibility = $user->getUserEligibility($_SESSION['uid']);

	                            	if ($details->eligibility_id == $user_eligibility->education_level) { ?>

					            <div class="like-btn <?php if($like_count == 1){ echo 'like-h';} ?>">Like</div>
					            <div class="dislike-btn <?php if($dislike_count == 1){ echo 'dislike-h';} ?>"></div>
					            <?php } } } ?>
					            <div id="rate-me">
						            <div class="stat-cnt">
						                <div class="rate-count"><?php echo $rate_all_count; ?></div>
						                <div class="stat-bar">
						                    <div class="bg-green" style="width:<?php echo $rate_like_percent; ?>%;"></div>
						                    <div class="bg-red" style="width:<?php echo $rate_dislike_percent; ?>%"></div>
						                </div><!-- stat-bar -->
						                <div class="dislike-count"><?php echo $rate_dislike_count; ?></div>
						                <div class="like-count"><?php echo $rate_like_count; ?></div>
						            </div>
						        </div>
					        </div>
					    </div>
					    <?php } ?>
					</div>

					<?php if ($details->cancel_note == "") { ?>					

                    <?php if(strtotime($details->edate) < strtotime(date('Y-m-d'))){ ?>					
					
	                <div class="share_item">
                    	<strong>You can share your ideas:</strong>
                    	<?php 
						// Connect to the database
						//include('config.php'); 

						$mysql_host = "localhost";
						$mysql_database = "es-db"; //create the database called "comment_sys"
						$mysql_user = "root";
						$mysql_password = "";

						mysql_connect($mysql_host,$mysql_user,$mysql_password);
						mysql_select_db($mysql_database); 

						$id_event = $_REQUEST['eid']; //the event id
						?>
						<div class="cmt-container" >
						    <?php 
						    $sql = mysql_query("SELECT * FROM `comments` WHERE id_event = '$id_event'") or die(mysql_error());;
						    while($affcom = mysql_fetch_assoc($sql)){ 
						        $role = $affcom['role'];
						        $uid = $affcom['uid'];
						        $comment = $affcom['comment'];
						        $add_date = $affcom['add_date'];

						        // Get gravatar Image 
						        // https://fr.gravatar.com/site/implement/images/php/
						        $default = "mm";
						        $size = 35;
						        $grav_url = "http://www.gravatar.com/avatar/".md5(strtolower(trim($role)))."?d=".$default."&s=".$size;



						    ?>
						    <div class="cmt-cnt">

						    	<?php 
						    		$user = new User();
						    		$comuser = $user->getCommentUser($uid,$role);

						    		if($comuser){
						    			if($comuser->thumb_img){
						    				echo '<img src="uploads/profile/'.$comuser->thumb_img.'" />';
						    			}
						    			else{
						    				echo '<img src="uploads/profile/profile-img.jpg" />';
						    			}
						    		}
						    		else{
						    			echo '<img src="'.$grav_url.'" />';
						    		}
						    	?>  

						        <div class="thecom">
						            <h5 style="text-transform:none;"><?php echo $comuser->fname.' '.$comuser->lname; ?></h5><span data-utime="1371248446" class="com-dt"><?php echo date("F j, Y, g:i a", strtotime($add_date)); ?></span>
						            <br/>
						            <p>
						                <?php echo $comment; ?>
						            </p>
						        </div>
						    </div><!-- end "cmt-cnt" -->
						    <?php } ?>

						    <?php 
						    	if (isset($_SESSION['uid'])) {						    		

						    		if(strtotime($details->edate) < strtotime(date('Y-m-d'))){

						    			if($_SESSION['role'] == 'Deleget'){

						    				$user_eligibility = $user->getUserEligibility($_SESSION['uid']);

	                            			if ($details->eligibility_id == $user_eligibility->education_level) {

								    			echo '
									    			 <div class="new-com-bt">
												        <span>Write a comment ...</span>
												    </div>
									    		';
									    	}
								    	}
						    		}					    		
						    	}
						    	else{
						    		echo '<a href="index.php">Sign in</a> to comment';
						    	}
						    ?>
						   
						    <div class="new-com-cnt">
						        <input type="hidden" id="role-com" name="role-com" value="<?php echo $_SESSION['role']; ?>" />
						        <input type="hidden" id="uid-com" name="uid-com" value="<?php echo $_SESSION['uid']; ?>" />
						        <textarea class="the-new-com"></textarea>
						        <div class="bt-add-com">Post comment</div>
						        <div class="bt-cancel-com">Cancel</div>
						    </div>
						    <div class="clear"></div>
						</div><!-- end of comments container "cmt-container" -->
						<script type="text/javascript">
						   $(function(){ 
						        //alert(event.timeStamp);
						        $('.new-com-bt').click(function(event){    
						            $(this).hide();
						            $('.new-com-cnt').show();
						            $('.the-new-com').focus();
						        });

						        /* when start writing the comment activate the "add" button */
						        $('.the-new-com').bind('input propertychange', function() {
						           $(".bt-add-com").css({opacity:0.6});
						           var checklength = $(this).val().length;
						           if(checklength){ $(".bt-add-com").css({opacity:1}); }
						        });

						        /* on clic  on the cancel button */
						        $('.bt-cancel-com').click(function(){
						            $('.the-new-com').val('');
						            $('.new-com-cnt').fadeOut('fast', function(){
						                $('.new-com-bt').fadeIn('fast');
						            });
						        });

						        // on post comment click 
						        $('.bt-add-com').click(function(){
						            var theCom = $('.the-new-com');
						            var theRole = $('#role-com');
						            var theUid = $('#uid-com');

						            if( !theCom.val()){ 
						                alert('You need to write a comment!'); 
						            }else{ 
						                $.ajax({
						                    type: "POST",
						                    url: "ajax-comment-add.php",
						                    data: 'act=add-com&id_event='+<?php echo $id_event; ?>+'&role='+theRole.val()+'&uid='+theUid.val()+'&comment='+theCom.val(),
						                    success: function(html){
						                        theCom.val('');
						                        theUid.val('');
						                        theRole.val('');
						                        $('.new-com-cnt').hide('fast', function(){
						                            $('.new-com-bt').show('fast');
						                            $('.new-com-bt').before(html);  
						                        })
						                    }  
						                });
						            }
						        });

						    });
						</script>
                    </div>  
                    <?php } ?>  
                    <?php } ?>                    
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

	<script>
	     
	     $('.rateit').bind('rated reset', function (e) {
	         var ri = $(this);
	 
	         
	         var value = ri.rateit('value');
	         var eventID = ri.data('eventid');
	         var lecturerID = ri.data('lecturerid');
	 
	         //ri.rateit('readonly', true);
	 
	         $.ajax({
	             url: 'ajax-rateit.php',
	             data: { id: eventID, value: value, lid: lecturerID },
	             type: 'POST',
	             success: function (data) {
	                 $('#response').append('<li>' + data + '</li>');
	 
	             },
	             error: function (jxhr, msg, err) {
	                 $('#response').append('<li style="color:red">' + msg + '</li>');
	             }
	         });
	     });
	 </script>

</body>
</html>