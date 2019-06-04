<?php

session_start();

$email = mysql_real_escape_string($_POST['email']);
$password = md5(mysql_real_escape_string($_POST['password']));

$mysql_db_hostname = "localhost";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "es-db";

$con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");
mysql_select_db($mysql_db_database, $con) or die("Could not select database");

$query = "SELECT * FROM `user` WHERE email = '$email' AND password='$password' AND status='1'";
$result = mysql_query($query)or die(mysql_error());
$num_row = mysql_num_rows($result);
$row=mysql_fetch_array($result);
if ($num_row >=1) {
	
	//if(  ) {

		echo 'Successful';
		$_SESSION['uid']=$row['user_id'];
		$_SESSION['fname']=$row['fname'];
		$_SESSION['lname']=$row['lname'];
		$_SESSION['thumb_img']=$row['thumb_img'];
		$_SESSION['role']=$row['role'];	

		mysql_query("insert into user_sessions (uid,login,session_id) values(".$row['user_id'].",now(),'".session_id()."')")or die(mysql_error());
			
		$_SESSION['sessionid'] = mysql_insert_id();	
	//}
	//else{
	//	echo 'Sorry, No matched account found on our system.';
	//}
}
else{
	$query = "SELECT * FROM `lecturer` WHERE email = '$email' AND password='$password' AND status='1'";
	$result = mysql_query($query)or die(mysql_error());
	$num_row = mysql_num_rows($result);
	$row=mysql_fetch_array($result);
	if ($num_row >=1 ) {
		
		//if( ) {

			echo 'Successful';
			$_SESSION['uid']=$row['lecturer_id'];
			$_SESSION['fname']=$row['fname'];
			$_SESSION['lname']=$row['lname'];
			$_SESSION['thumb_img']=$row['thumb_img'];
			$_SESSION['role']=$row['role'];	

			mysql_query("insert into user_sessions (lid,login,session_id) values(".$row['lecturer_id'].",now(),'".session_id()."')")or die(mysql_error());
			
			$_SESSION['sessionid'] = mysql_insert_id();		
		//}
		//else{
		//	echo 'Sorry, No matched account found on our system.';
		//}
	}
	else{
		$query = "SELECT * FROM `deleget` WHERE email = '$email' AND password='$password' AND status='1'";
		$result = mysql_query($query)or die(mysql_error());
		$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if( $num_row >=1 ) {

			echo 'Successful';
			$_SESSION['uid']=$row['deleget_id'];
			$_SESSION['fname']=$row['fname'];
			$_SESSION['lname']=$row['lname'];
			$_SESSION['thumb_img']=$row['thumb_img'];
			$_SESSION['role']=$row['role'];	

			mysql_query("insert into user_sessions (did,login,session_id) values(".$row['deleget_id'].",now(),'".session_id()."')")or die(mysql_error());
			
			$_SESSION['sessionid'] = mysql_insert_id();		
		}
		else{
			echo 'Sorry, No matched account found on our system.';
		}
	}
}

?>