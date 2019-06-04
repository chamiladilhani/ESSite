
<?php  include('header_includes.php'); ?>

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

</head>

<body>

<div id="wrapper">

	<div id="headcontainer">
		<?php include('top.php'); ?>
	</div>

	<div id="maincontentcontainer" class="s_contact">
		<div id="maincontent">

			<div class="breadcrumb">
            	<a href="index.php">Home</a> &raquo; Profile
            </div>

			<div class="section group">
				<h1>Deleget Profile</h1>
                <div class="col span_3_of_4 content_aside" style="margin-left:0;">
                	<div class="proList">
	                    <ul>
							
                            <li>

	                            <img class="proImg" src="img/deleget.jpg">

	                            <div class="proDetails">
	                                <span class="proTitle">Christina Allen </span>
	                                <!--<p class="contactJobtitle">Web Application Developer/Designer</p>
	                                <p class="contactJobtitle"  style="color:#555">@ Speed plus solutions</p>-->
	                                <p class="contactJobtitle" style="color:#77A22F">Information Technology</p>
	                                <span class="proAddress">#2376<br />New York<br />USA<br /></span>
	                            </div>

	                            <div class="proContact">
	                            <span class="proWebsite"><img src="img/icons/icon-tel.png" width="14" height="13" alt="Tel"> +44 (0)713 789 660</span>
	                            <span class="proEmail"><img src="img/icons/icon-email.png" width="14" height="12" alt="Email"> <a href="mailto:chinthana@gmail.com">Christina@gmail.com</a></span>
	                            <span class="proWebsite"><img src="img/icons/icon-web.png" width="14" height="14" alt="Web"> <a href="#">http://www.Christina's.com/</a></span>
	                            </div>

                            </li>
	                        
	                    </ul>
	                </div>
                </div>

                <div class="col span_1_of_4 pg_aside">
                	<div class="also_in">
			        	<h3 class="accordion-box-header"><div class="accordion-box-link acl2"></div>Also in this section</h3>
			        	<ul class="accordion-box-content acl1">
			            	
							<li>&rsaquo; <a href="#">Manage your profile</a></li>
						
							<li>&rsaquo; <a href="#">View Reservation list</a></li>
						
							<li>&rsaquo; <a href="#">View Reservation History</a></li>
							
			            </ul>
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
          	</div>

		</div>

		<div id="infostrip">
	    	<div id="maincontent"  class="group">
	        <div class="section group">
	        	<div class="col span_2_of_3">

	                <!--<div class="subpagefeature" style="margin-bottom:20px;">
	                	<h5>Summery</h5>
	                    <p class="abstract">Ten years’ experience in varied and challenging roles has kept me focused on progressing my technical abilities, always at the forefront of new and emerging technologies. Specialties:Virtualization, VDI, Microsoft Technologies, Disaster Recovery, Project Managemen. </p>
	                    <a href="#" class="iconlink">Change</a>
	                </div>-->

	                <div class="section group">
	        			<div class="col span_1_of_3">
	        				<div class="subpagefeature">
			                	<h5>Working experience</h5>
			                    <ul style="margin-bottom:10px">
			                    	<li>Spring global services</li>
			                    	<li>Stirling group</li>
			                    	<li>Srilanka insurance</li>
			                    	<li>PC house</li>
			                    </ul>
			                    <a href="#" class="iconlink">Change</a>
			                </div>
	        			</div>
	        			<div class="col span_1_of_3">
	        				<div class="subpagefeature">
			                	<h5>Skills</h5>
			                    <ul style="margin-bottom:10px">
			                    	<li>Windows server</li>
			                    	<li>Active directoy</li>
			                    	<li>Virtualization</li>
			                    	<li>Vmware</li>
			                    	<li>Enterprise architecture</li>
			                    </ul>
			                    <a href="#" class="iconlink">Change</a>
			                </div>
	        			</div>
	        			<div class="col span_1_of_3">
	        				<div class="subpagefeature">
			                	<h5>Education level</h5>
			                    <ul style="margin-bottom:10px">
			                    	<li>Consultant networks/project management</li>
			                    	<li>ITIL – srilanka fourum</li>
			                    	<li>IT managers group srilanka</li>			                    	
			                    </ul>
			                    <a href="#" class="iconlink">Change</a>
			                </div>
	        			</div>
	        		</div>

	                

	                
                </div>
	          </div>
	        </div>
		</div>

	</div>	
	
	<!-- Footer inserted here -->
	<?php include('footer.php'); ?>

</div>

	<?php include('footer_includes.php'); ?>

</body>
</html>