<?php 

include('header_includes.php');

$db = new DB();

$eid = (int)$_POST['id'];
$value = (int)$_POST['value'];
$lid = (int)$_POST['lid'];

$user = new User();

if($_SESSION['role'] == 'Deleget'){

	$check = $db->query("SELECT uid,lecturer_id,event_id FROM `lecturer_rate` WHERE uid=".$user->getUID()." AND event_id= $eid");

	if($db->numRows($check)==0)
	{
		$db->query("INSERT INTO `lecturer_rate` (lecturer_id,event_id,uid,value) VALUES ($lid,$eid,".$user->getUID().",$value)");
	}
}

?>