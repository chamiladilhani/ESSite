<?php

include('header_includes.php');

$user = new User();

$data = array('name' => $_POST['name']);

$response = $user->editSubject($_POST['sid'],$data); 

if ($response) {
    echo 'true';
}
else{
    echo 'false';
}

?>
