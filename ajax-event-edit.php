<?php

include('header_includes.php');

$user = new User();

$room = $user->getRoomDetails($_POST['evenue']);

$data = array(

		'ename' 		=> $_POST['ename'],
		'ecategory' 	=> $_POST['ecategory'],
		'ecategory_id' 	=> $_POST['ecategory_id'],
		'electurer' 	=> $_POST['electurer'],
		'edate' 		=> $_POST['edate'],
		'ehour' 		=> $_POST['ehour'],
		'eminute' 		=> $_POST['eminute'],
		'ehour_to' 		=> $_POST['ehour_to'],
		'eminute_to' 	=> $_POST['eminute_to'],
		'etimetype' 	=> $_POST['etimetype'],
		'elocation_id' 	=> $_POST['elocation'],
		'evenue' 		=> $room->name,
		'evenue_no' 	=> $_POST['evenue'],
		'no_of_seats' 	=> $room->no_of_seats,
		'eligibility_id' => $_POST['eligibility_id'],
		'edescription' 	=> $_POST['edescription'],
		'organizer_id' 	=> $_SESSION['uid'],
		'organizer_name' 	=> $_SESSION['fname'].' '.$_SESSION['lname'],
		'emultimedia' 	=> implode(",",$_POST['multimedia']),
		'esupporters' 	=> implode(",",$_POST['supporters']),
		'o_by' 			=> $_POST['o_by'],
	);

$response = $user->updateEvent($_POST['eid'],$data); 

if ($response) {
    echo 'true';
}
else{
    echo 'false';
}

?>
