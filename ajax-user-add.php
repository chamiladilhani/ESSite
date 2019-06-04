<?php

include('header_includes.php');

$user = new User();

$status = 1;

$data = array(

		'email' 	=> $_POST['email'],
		'fname' 	=> $_POST['fname'],
		'lname' 	=> $_POST['lname'],
		'password' 	=> $_POST['password'],
		'role'		=> $_POST['role'],
		'status'	=> $status,
	);

$response = $user->add($data); 

if ($response) {
    echo 'true';
}
else{
    echo 'false';
}

?>
