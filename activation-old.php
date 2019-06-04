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
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title></title>
<link rel="stylesheet" href="<?php echo $base_url; ?>style.css"/>
</head>
<body>
	<div id="main">
	<h2><?php echo $msg; ?></h2>
	<h2>Account activated.</h2>
	</div>
</body>
</html>
