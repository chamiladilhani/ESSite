<?php

include('header_includes.php');

$user = new User();

$data = array(

		'title' 		=> $_POST['title'],
		'description'	=> $_POST['description'],
		'publisher_id'	=> $_SESSION['uid'],
		'publisher_name'	=> $_SESSION['fname'].' '.$_SESSION['lname'],
	);

$response = $user->editNews($_POST['nid'],$data); 

if ($response) {
    echo 'true';
}
else{
    echo 'false';
}

?>
