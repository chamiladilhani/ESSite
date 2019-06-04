<?php

include('header_includes.php');

$user = new User();

$data = array(
				'name' => $_POST['name'], 
				'groups' => implode(",",$_POST['groups'])
			);

$response = $user->editEligibility($_POST['aid'],$data); 

if ($response) {
    echo 'true';
}
else{
    echo 'false';
}

?>
