<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'es-db');
$connection = @mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$base_url='http://localhost/ES-site/';

$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{
	$code=mysql_real_escape_string($_GET['code']);

	$c=mysqli_query($connection,"SELECT lecturer_id FROM `lecturer` WHERE activation='$code'");

	if(mysqli_num_rows($c) > 0)
	{
		$count=mysqli_query($connection,"SELECT lecturer_id FROM `lecturer` WHERE activation='$code' and status='0'");

		if(mysqli_num_rows($count) == 1)
		{
		    mysqli_query($connection,"UPDATE `lecturer` SET status='1' WHERE activation='$code'");
		    $msg="Your account is activated";	
	    }
	    else
	    {
			$msg ="Your account is already active, no need to activate again";
	    }
    }
    else{
    	$c=mysqli_query($connection,"SELECT deleget_id FROM `deleget` WHERE activation='$code'");

    	if(mysqli_num_rows($c) > 0){

    		$count=mysqli_query($connection,"SELECT deleget_id FROM `deleget` WHERE activation='$code' and status='0'");

			if(mysqli_num_rows($count) == 1)
			{
			    mysqli_query($connection,"UPDATE `deleget` SET status='1' WHERE activation='$code'");
			    $msg="Your account is activated";	
		    }
		    else
		    {
				$msg ="Your account is already active, no need to activate again";
		    }
    	}
    	else{
    		$c=mysqli_query($connection,"SELECT user_id FROM `user` WHERE activation='$code'");

    		if(mysqli_num_rows($c) > 0){

    			$count=mysqli_query($connection,"SELECT user_id FROM `user` WHERE activation='$code' and status='0'");

				if(mysqli_num_rows($count) == 1)
				{
				    mysqli_query($connection,"UPDATE `user` SET status='1' WHERE activation='$code'");
				    $msg="Your account is activated";	
			    }
			    else
			    {
					$msg ="Your account is already active, no need to activate again";
			    }
    		}
    		else
		    {
				$msg ="Wrong activation code.";
		    }
    	}
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
	<link rel="stylesheet" href="<?php echo $base_url; ?>style.css"/>
	<?php include('header.php'); ?>

</head>

<body>

<div id="wrapper">

	<div id="headcontainer">
		<?php include('top-act.php'); ?>
	</div>

	<div id="maincontentcontainer">
		<div id="maincontent">

			<div class="section group centeredtext">
				<h1 class="linedivider" style="margin-bottom:0;"><span><?php echo $msg; ?>.</span><a href="index.php"><span> Sing in</span></a></h1>
			</div>

		</div>
	</div>

</div>

</body>
</html>