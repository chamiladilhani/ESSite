<?php

include('header_includes.php');

$user = new User();

$data = array(

		'cancel_note' 	=> $_POST['cancel_note'],
	);

$response = $user->cancelEvent($_POST['event_id'],$data); 

if ($response) {
    echo 'true';
}
else{
    echo 'false';
}

?>
