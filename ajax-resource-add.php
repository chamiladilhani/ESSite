<?php

include('header_includes.php');

$user = new User();

$data = array(

		'type' 			=> $_POST['type'],
		'name' 			=> $_POST['name'],
		'no_of_seats' 	=> $_POST['no_of_seats'],
		'location_id' 	=> $_POST['location_id'],
		'description'	=> $_POST['description'],
	);

$response = $user->addResources($data); 

if ($response) {
    echo 'true';
}
else{
    echo 'false';
}

?>
