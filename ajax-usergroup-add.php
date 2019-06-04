<?php

include('header_includes.php');

$user = new User();

if (isset($_POST['p_name'])) {
	$data = array('name' => $_POST['p_name']);
}
else{
	$data = array('name' => $_POST['n_name']);
}

$response = $user->addGroup($data); 

if ($response) {
    echo 'true';
}
else{
    echo 'false';
}

?>
