<?php
session_start();

include_once 'classes/db.class.php';
include_once 'classes/function.class.php';
include_once 'classes/user.class.php';
include_once 'classes/lecturer.class.php';
include_once 'classes/comment.class.php';
include_once 'classes/deleget.class.php';
include_once 'classes/upload.class.php';
include_once 'classes/message_stack.class.php';
include_once 'classes/validation.class.php';

//Authentication user
if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
	$MessageStack = new MessageStack();
}
else{
	$noAuth = array('index.php');
	$fileName = pathinfo($_SERVER['PHP_SELF']);	
	$MessageStack = new MessageStack();
	if(!in_array($fileName['basename'], $noAuth)){
		redirect('index.php');
	}
}

?>