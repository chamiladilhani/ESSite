<?php 

include('header_includes.php');

	if ($_SESSION['role'] == 'Administrator' || $_SESSION['role'] == 'Organizer') {
		$user = new User();	
		$user->logout($_SESSION['uid']); 
	}
	elseif ($_SESSION['role'] == 'Lecturer') {
		$lecture = new Lecturer();	
		$lecture->logout($_SESSION['uid']); 
	}
	else{
		$deleget= new Deleget();	
		$deleget->logout($_SESSION['uid']);
	}
	
?>