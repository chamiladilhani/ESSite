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

	<?php include('header.php'); ?>

	<link href="css/vscroller.css" rel="stylesheet" type="text/css" />

	<!-- Important Owl stylesheet -->
	<link rel="stylesheet" href="owl-carousel/owl.carousel.css">
	 
	<!-- Default Theme -->
	<link rel="stylesheet" href="owl-carousel/owl.theme.css">

	<style type="text/css">

	.demof{
		border: 1px solid #ddd;
		margin: 0 0;
	}
	.demof ul{
		padding: 0;
		list-style: none;
		width: 100%;
	}
	.demof li{
		padding: 20px;
	}
	.demof li.odd{
		background: #fafafa;
	}
	.demof li:after {
		content: '';
		display: block;
		clear: both;
	}
	.demof img{
		float: left;
		width: 60px;
		margin: 5px 15px 0 0;
	}
	.demof a{
		font-family: Arial, sans-serif;
		font-size: 13px;
		font-weight: bold;
		color: #004B8E;
	}
	.demof p {
		margin: 5px 0 0;
		font-size: 12px;
	}
	.et-run{
	    background-color: #0cf;
	    color: white;
	    border: 1px solid black;
	}
	.hidden { display: none; }
	</style>
	

</head>

<body>

<div id="wrapper">

	<div id="headcontainer">
		<?php include('top.php'); ?>
	</div>

	<div id="topimagecontainer">
		<div id="topimage"  class="group">
			<div class="flexslider">
				<ul class="slides">
					<?php
						$sliderList = $user->getSliderList();
						
						if($sliderList){
							
							foreach($sliderList as $singleSlide){
									
								$singleSlide = (object)$singleSlide;

								echo '
								<li>
									<img src="'.$singleSlide->full.'" />
									';
									if ($singleSlide->title or $singleSlide->description) {
										echo '<span class="flex-caption">';
										if ($singleSlide->title != "") {
											echo '<strong>'.$singleSlide->title.'</strong>';
										}
										if ($singleSlide->description != "") {
											echo '<p>'.$singleSlide->description.'</p>';
										}
										echo '</span>';
									}
								echo '
								</li>
								';
							}
						}
					?>
					
				</ul>
			</div>
		</div>
	</div>

	<div id="maincontentcontainer">
		<div id="maincontent">

			<div class="section group">
                    <div class="col span_2_of_3">
                        <div class="subpagefeature">
                        <h5>Featured Events</h5>
    						<div class="clientscarousel">
								<ul id="blah" class="slides hidden" style="text-align:left">
						        <?php
									$userList = $user->getEventSlider();
									
									if($userList){
										
										foreach($userList as $singleUser){
												
											$singleUser = (object)$singleUser;

											if ($singleUser->full_img) {
												$image = $singleUser->full_img;
											}
											else{
												$image = 'education-sky.png';
											}
												
											echo '
												<li>
									            	<a>
									            		<div class="f-events">
									            			<div class="pagefeature app-sidefeature">
										            			<div style="width:45%;margin-right:6px;display:inline-block">
										            				<a><small style="font-size:10px;position:absolute;background:#004A8D;padding:0 5px;color:#fff;">'.date("jS F, Y", strtotime($singleUser->edate)).'</small><img style="background:none !important;height:100px;width:100%;" src="uploads/events/'.$image.'"  alt="" class="" /></a>
										            			</div>
										            			<div style="width:50%;float:right;right;display:inline-block">
										            				<a href="event-more.php?eid='.$singleUser->id.'"><h6 style="font-weight:bold;">'.$singleUser->ename.'</h6></a>
																	<p style="font-size:11px">'.current(explode("\n", wordwrap($singleUser->edescription, 70, "...\n"))).' <a href="event-more.php?eid='.$singleUser->id.'">more</a></p>
																	
										            			</div>	
															</div>
									            		</div>
									            	</a>
									            </li>
											';
										}
									}
									else{
										echo '
											<li>
												<img style="" src="img/no-event-image.png"/>
								            </li>
											 
										';
									}
								?>						            			            
						        </ul>
							</div>
                        </div>
                    </div>
                    <div class="col span_1_of_3">
                    	<?php if(empty($_SESSION['uid'])){ ?>
                        <div class="subpagefeature">
	                        <h5 id="newsletter">members</h5>
	                        <h4>Sign In</h4>     
	                        <form id="loginForm" method="post" data-ajax="false">

	                        	<div style="display:none;" id="login-ok" class="logged-box alert"></div>	
								<div style="display:none;" id="login-error" class="error-box error-login alert"></div>

		                        <label for="">Email address </label>                     
		                        <input type="email" name="email" id="email" required placeholder="Please enter your email address">

		                        <label for="">Password </label>  
		                        <input type="password" name="password" id="password" required placeholder="Please enter your password">

		                        <button type="button" name="login" id="login" class="button-secondary button-small pure-button">Sign in</button>
		                        <p style="float: right;"><a href="forget-password.php">Need help?</a></p>
	                        </form>
	                        
	                        <p style="margin-top: 10px;"><a href="registration.php">Register</a> with us, and it's free.</p>    
                        </div> 
                        <?php } ?>

                        <?php if(isset($_SESSION['uid'])){ ?>
                        <div class="subpagefeature">
	                        <h5 id="newsletter">members area</h5>
	                        
	                        <div class="pro-profile app-sidefeature" style="width:97%;margin:20px auto 0; padding:5px;display:table;">
						    	
						    	<a style="width:40%;float:right">
						    		<?php if($_SESSION['thumb_img']){ ?>
						    		<img style="width:70%;margin:10px auto 0" class="circle-text" src="uploads/profile/<?php echo $_SESSION['thumb_img']; ?>">	
						    		<?php } ?>
						    		<?php if(empty($_SESSION['thumb_img'])){ ?>
						    		<img style="width:70%" class="circle-text" src="uploads/profile/testp.png">	
						    		<?php } ?>			    		
						    	</a>
						    	<div style="width:60%;float:left">
							    	<p style="font-size:16px;text-align:center;text-transform:uppercase;margin-top:10px;color:#004B8D;">Welcome!</p>  
							    	<p style="font-size:13px;text-align:center;text-transform:uppercase;margin-top:5px;color:#555;font-weight:bold"><?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></small></p>
							    	<p style="font-size:11px;text-align:center;text-transform:uppercase;margin-top:5px;color:#555;font-weight:bold"><?php echo $_SESSION['role']; ?></p>								
						    	</div>
						    </div> 
                        </div> 
                        <?php } ?>
                    </div>
          	</div>

			<div class="section group">
				<div class="subpagefeature">
                 	<h5>Teachers Make the Difference</h5>
                </div> 	
			</div>

			<div class="section group">
				<div class="col span_1_of_3" style="margin-top:0;background: url(img/hdr-photography-new-york-city-2650941-3840x2400.jpg) no-repeat;background-size: cover;">
				    
				    	<?php
							$lecturer = new Lecturer();

							$userList = $lecturer->getLecturerToDisplay();						
							
							if($userList){

							echo'	
									<div id="owl-example" class="owl-carousel">
								';	
				                    
								
								foreach($userList as $singleUser){
										
									$singleUser = (object)$singleUser;

									echo '
										<div class="pro-profile">
									    	<a class="" href="profile.php?pid='.$singleUser->id.'">
									    	';
									    	if ($singleUser->thumb_img) {
									    		echo '<img class="circle-text" src="uploads/profile/'.$singleUser->thumb_img.'">';
									    	}
									    	else{
									    		echo '<img class="circle-text" src="uploads/profile/testp.png">';
									    	}
									    	echo'		    	
									    		
									    	</a>
									    	<h2 style="font-size:20px;text-align:center;margin-top:5px;color:#fff;font-weight:bold"><i>'.$singleUser->fname.' '.$singleUser->lname.'</i></h2>
									    	<p style="font-size:12px;text-align:center;text-transform:uppercase;margin-top:5px;color:#fff;font-weight:bold">'.$singleUser->company_designation.'</p>
									    	
									    	<blockquote>								
												<p style="font-size:17px;">'.current(explode("\n", wordwrap($singleUser->summary, 100, "...\n"))).' <a style="background:none" href="profile.php?pid='.$singleUser->id.'">more</a></p>
											</blockquote>
											
									    </div>
									';
								}
								echo '
								</div>
								';
							}
						?>					    
				    
			    </div>

				<div class="col span_1_of_3">
					<div class="pagefeature feature3">
						<div class="panel panel-default">
						<div class="panel-heading"> <span class="glyphicon glyphicon-comment"></span><b>Latest Comments</b></div>
						<div class="panel-body">
						<div class="section group">
						<div class="group">							
							<?php

								$comment = new Comment();

								$userList = $comment->getCommentRow();
								
								
								if($userList){
									echo '<ul class="demo1">';
									foreach($userList as $singleUser){
											
										$singleUser = (object)$singleUser;

										if ($singleUser->thumb_img) {
											$image = $singleUser->thumb_img;
										}
										else{
											$image = 'profile-img.jpg';
										}

										if($singleUser->event_publish != '0'){

											$user = new User();
						    				$comuser = $user->getCommentUser($singleUser->uid,$singleUser->role);

											echo '

												<li class="news-item">
													<table cellpadding="4" style="100%;">
														<tr>
															<td style="width:20%;float:left;padding-left:0;"><img style="background:none;" src="uploads/profile/'.$image.'" width="60" class="img-circle" /></td>
															<td style="width:75%;float:left;padding-left:10px;font-size:11px;">
																<small style="color:#004B8E;font-size:11px;"><b>'.$comuser->fname.' '.$comuser->lname.'</b></small><small style="color:#666;font-size:11px;"> commented on </small><a href="event-more.php?eid='.$singleUser->id_event.'"><b>'.$singleUser->event_name.'</b></a><br>
																'.current(explode("\n", wordwrap($singleUser->comment, 50, "...\n"))).'<br>															
																<small style="color:#555;font-size:11px;">'.$singleUser->add_date.'</small>
															</td>
														</tr>
													</table>
												</li>
											';
										}			
										
									}

									echo "</ul>";
								}
								else{
									echo '
										 <pre style="background:#004A8D;color:#FFFFFF;padding:5px;text-align:center;margin:40% 0;">No Recent Cooments.</pre>
									';
								}
							?>
						
						</div>
						</div>
						</div>
						</div>
					</div>
				</div>

				<div class="col span_1_of_3" style="margin-top:0">  
				<div style="border:1px solid #ddd;border-bottom:none;background:#F5F5F5;padding:10px 15px"><span class="glyphicon glyphicon-comment"></span><b>Latest News</b></div>

            	<?php
					$news = new User();

					$userList = $news->getNews();							
					
					if($userList){
						echo '
						<div class="news1 demof">
						<ul>
						';

						foreach($userList as $singleUser){
								
							$singleUser = (object)$singleUser;

							if ($singleUser->thumb) {
								echo '<li><img src="uploads/news/'.$singleUser->thumb.'" />';
							}	
							else{
								echo '<li><img src="uploads/news/no-image.png" />';
							}					

							echo '<a href="news-more.php?nid='.$singleUser->id.'">'.$singleUser->title.'</a><p>'.current(explode("\n", wordwrap($singleUser->description, 100, "...\n"))).'</p></li>';

						}

						echo '
							</ul>
						</div>
						<div style="height:40px;border-top:none;background:#f5f5f5;border:1px solid #ddd;border-top:none;border-radius:0;" class="panel-footer"> </div>		
						';
					}
					else{
						echo '<div style="border:1px solid #ddd;padding:20px 15px;"><pre style="background:#004A8D;color:#FFFFFF;padding:5px;text-align:center;margin:40% 0;">No Recent News.</pre></div>';
					}
				?>	
								
				</div>
			</div>

		</div>
	</div>
	
	<!-- Footer inserted here -->
	<?php include('footer.php'); ?>

</div>

	<?php include('footer_includes.php'); ?>

	<script>
		$(document).ready( function(){
		    $('#blah').removeClass('hidden');
		} );
	</script>

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
	          controlNav: true,
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
	  }());


	</script>


	<script src="ajax-js-files/login-validation.js"></script>

	<!-- Include js plugin -->
	<script src="owl-carousel/owl.carousel.js"></script>
	<script>
    	    $(document).ready(function() {

		    $("#owl-example").owlCarousel({

		    	autoPlay: 10000, //Set AutoPlay to 10 seconds 
				items : 1,
				pagination: false,
		    });
		     
		    });
    </script>

    <script type="text/javascript" src="news/jquery.easing.min.js"></script>
	<script type="text/javascript" src="news/jquery.easy-ticker.js"></script>
	<script>
	$(function(){
		$('.news1').easyTicker({
			direction: 'up',
			visible: 3,
			interval: 10000
		});
	});
	</script>
	

</body>
</html>