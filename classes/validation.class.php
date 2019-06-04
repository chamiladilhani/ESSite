<?php

class Validation
{
	public function isInt($data)
	{
		return (boolean) is_int($data);
	}
	
	public function isDouble($data)
	{
		return (boolean) is_double($data);
	}
	
	public function isString($data)
	{
		return ($data != " " && $data != "") ? true:false;	
	}
	
	public function isUsername($data){
		return (strlen($data)>3);	
	}
		
	public function isPassword($data){
		return (strlen($data)>5);
	}
	
	public function isMatchPassword($p1,$p2){
		return ($p1 == $p2);
	}
	
	public function isTelephone($data)
	{
		return (strlen($data) > 0 && strlen < 15)? true:false;	
	}
	
	public function isEmail($data)
	{
		return (filter_var($data, FILTER_VALIDATE_EMAIL))? true:false;	
	}
	
	public function isNIC_No($data)
	{
		if(strlen($data) == 10)
		{
			if (substr($data, -1,1)== 'v') {
				
				return true;
				
			}
			else {
				return false;
			}
		}
		else {
			
			return false;
		}
		
	}
		 
}

?>