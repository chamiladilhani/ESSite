<?php

/**
 * Deleget Class - Handle the all Deleget related processes.
 * @package ES-site
 */
class Deleget
{	
	/** INTERNAL: Hold the database object.
      */
	var $db;
	
	/** INTERNAL: Hold the Deleget ID.
      */
	var $did;
	
	/** Constructer Method
      *
      * @return Void.
      */
	function Deleget()
	{
		$this->db = new DB();
		$this->did = 0;
		
	}
	
	/** Logout Deleget - Destroy the session and redirect to the login page.
      *
      * @return Void
      */
	function logout()
	{
		$this->db->execute("update user_sessions set logout = now() where id = '".$_SESSION['sessionid']."'");
		session_destroy();
		header("location:index.php");
	}
	
	/** Get Deleget Roles
      *
      * @return array.
      */
	function getRoles(){
		
		$return;
		$this->db->query("SELECT name, role FROM deleget_roles");
		
			while($line = $this->db->fetchNextObject()){
				$return[$line->role] = $line->name;
			}
		return $return;
		}
	
	/** Add the new Deleget
      * @param $data The values in array.
      * @return Return true always.
      */	
	function add($data)
		{
			//$data['password'] = md5($data['password']);
			$return = $this->db->query("INSERT INTO `deleget` (".array2keys($data).",`rdate`) VALUES (".array2values($data).",now())");
			return true;
		}
	
	/** Edit the specific customer
      * @param $eid Deleget id which want to edit.
	  * @param $data The values in array.
      * @return Return bool
      */
	function edit($did, $data){
		$this->db->query("update `deleget` set ".array2update($data)." where deleget_id = ". mysql_real_escape_string($did));
		return true;
	}
	
	
	/** Delete a specfic Delegets
      * @param $data The Deleget id's as array which needs to delete.
      * @return Return True
      */
	function delete($data)
		{		
			$this->db->query("DELETE FROM deleget WHERE deleget_id=".$data." LIMIT 1");		
		}
	
	/** Get the specific Deleget's details.
      * @param $eid Deleget id.
      * @return Return data object
      */
	function getUID()
	{
		return (int)$_SESSION['uid'];
	}

	function getDelegetDetails($uid = 0)
	{
		if($uid == 0){
			$uid = $this->getUID();
		}
		$get = $this->db->query("SELECT * FROM `deleget` WHERE deleget_id=". mysql_real_escape_string($uid) );
		$getDet = $this->db->fetchNextObject($get);
		return $getDet;
	}

	function getDelegetDetailsPro($did)
	{
		$get = $this->db->query("SELECT * FROM `deleget` WHERE deleget_id=". mysql_real_escape_string($did) );
		$getDet = $this->db->fetchNextObject($get);
		return $getDet;
	}
	
	/** Get the all Deleget details.
      * 
      * @return Return array with Deleget details.
      */
	function getDeleget(){
			
			$query = $this->db->query("select * from deleget");
			$return = array();
			
			while($Deleget = $this->db->fetchNextObject($query)){
				
				$return[] = array(
					'id' 				=> $Deleget->id,
					'uname' 			=> $Deleget->uname,
					'fname' 			=> $Deleget->fname,
					'lname' 			=> $Deleget->lname,
					'rolename'			=> $this->getDelegetRoleName($Deleget->role)
				);
			}
			
			return $return;
		}
	
	/** Get the  Deleget dropdown.
      * 
      * @return Return string with html dorpdown.
      */
	function getDelegetDropDown($selected = 0){
		$get = $this->db->query("SELECT * FROM `deleget`");
		$data = array();
		
		while($line = $this->db->fetchNextObject($get)){
			$data[$line->deleget_id]= $line->fname .' '. $line->lname;
		}
		
		return array2dropdown($data, $selected);
	}
	
	
	function getDelegetRoleName($rid){
		return $this->db->queryUniqueValue("SELECT name FROM deleget_roles WHERE role = '" . $rid . "'");
		}
	
	/** Get the all Deleget id.
      * 
      * @return Return Int.
      */
	function getEID()
	{
		return (int)$_SESSION['eid'];
	}
	
	/** Get the Deleget name by id
      * @param $eid Deleget id which want to get name.
      * @return Return String Name
      */
	function getDelegetName($eid){
		return $this->db->queryUniqueObject("SELECT fname,lname from deleget WHERE id = " . $eid);
	}
		
}
?>
