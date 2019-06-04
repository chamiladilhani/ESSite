<?php 

function array2values($data)
{
	$return = "";
	
	foreach($data as $k => $v)
	{
		
		$return .= "'".mysql_real_escape_string($v)."', ";
		
	}
	
	return substr($return,0 ,-2);
}

function array2keys($data){
	
	$return = "";
	
	foreach($data as $k => $v){
		$return .= '`'. $k . "`, ";
		
	}
	
	return substr($return,0 ,-2);
}

function array2update($data){
	
	$return = "";
	
	foreach($data as $k => $v){
		$return .= $k . " = '" . $v . "', ";
		
	}
	
	return substr($return,0 ,-2);
}


function array2dropdown($data, $selected = ''){
	$return = "";
	
	foreach($data as $k => $v){
			if($k == $selected){
				$return .= "<option value=\"$k\" selected=\"selected\">$v</option> \n";
			}
			else{
				$return .= "<option value=\"$k\">$v</option> \n";
			}
	}
	
	return $return;
}

function redirect($location){
	header("Location: $location");	
	return true;
}


function _rand($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

?>