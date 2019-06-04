<?php

include('header_includes.php');

$user = new User();

$data = array(

		'title' 		=> $_POST['title'],
		'description'	=> $_POST['description'],
		'order_no'		=> $_POST['order_no'],
	);

$response = $user->editSlider($_POST['sid'],$data); 

if ($response) {
    echo 'true';
}
else{
    echo 'false';
}

?>
