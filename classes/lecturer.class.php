<?php

/**
 * Lecturer Class - Handle the all Lecturer related processes.
 * @package ES-site
 */
class Lecturer
{	
	/** INTERNAL: Hold the database object.
      */
	var $db;
	
	/** INTERNAL: Hold the Lecturer ID.
      */
	var $lid;
	
	/** Constructer Method
      *
      * @return Void.
      */
	function Lecturer()
	{
		$this->db = new DB();
		$this->lid = 0;
		
	}
	
	/** Logout Lecturer - Destroy the session and redirect to the login page.
      *
      * @return Void
      */
	function logout()
	{
		$this->db->execute("update user_sessions set logout = now() where id = '".$_SESSION['sessionid']."'");
		session_destroy();
		header("location:index.php");
	}
	
	/** Get Lecturer Roles
      *
      * @return array.
      */
	function getRoles(){
		
		$return;
		$this->db->query("SELECT name, role FROM Lecturer_roles");
		
			while($line = $this->db->fetchNextObject()){
				$return[$line->role] = $line->name;
			}
		return $return;
		}
	
	/** Add the new Lecturer
      * @param $data The values in array.
      * @return Return true always.
      */	
	function add($data)
		{
			//$data['password'] = md5($data['password']);
			$return = $this->db->query("INSERT INTO `lecturer` (".array2keys($data).",rdate) VALUES (".array2values($data).",now())");
			return true;
		}
	
	/** Edit the specific Lecturer
      * @param $uid Lecturer id which want to edit.
	  * @param $data The values in array.
      * @return Return bool
      */
	function edit($lid, $data){
		$this->db->query("update `lecturer` set ".array2update($data)." where lecturer_id = ". mysql_real_escape_string($lid));
		return true;
	}
	
	
	/** Delete a specfic Lecturers
      * @param $data The Lecturer id's as array which needs to delete.
      * @return Return True
      */
	function delete($data)
		{		
			$this->db->query("DELETE FROM lecturer WHERE id=".$data." LIMIT 1");		
		}

	function deleteLecturer($data)
		{		
			$this->db->query("DELETE FROM lecturer WHERE lecturer_id=".$data." LIMIT 1");		
		}
	
	/** Get the specific Lecturer's details.
      * @param $eid Lecturer id.
      * @return Return data object
      */
	function getUID()
	{
		return (int)$_SESSION['uid'];
	}
	
	function getLecturerDetails($uid = 0)
	{
		if($uid == 0){
			$uid = $this->getUID();
		}
		$get = $this->db->query("SELECT * FROM `lecturer` WHERE status= '1' and lecturer_id=". mysql_real_escape_string($uid) );
		$getDet = $this->db->fetchNextObject($get);
		return $getDet;
	}

	function getLecturerDetailsPro($uid)
	{
		$get = $this->db->query("SELECT * FROM `lecturer` WHERE status= '1' and lecturer_id=". mysql_real_escape_string($uid) );
		$getDet = $this->db->fetchNextObject($get);
		return $getDet;
	}

	function getLecturerDetailsToEvent($lid)
	{
		$get = $this->db->query("SELECT * FROM `lecturer` WHERE lecturer_id=". mysql_real_escape_string($lid) );
		$getDet = $this->db->fetchNextObject($get);
		return $getDet;
	}
	
	/** Get the all Lecturer details.
      * 
      * @return Return array with Lecturer details.
      */
	function getLecturer(){
			
			$query = $this->db->query("SELECT * FROM `lecturer`");
			$return = array();
			
			while($Lecturer = $this->db->fetchNextObject($query)){
				
				$return[] = array(
					'id' 					=> $Lecturer->lecturer_id,
					'email' 				=> $Lecturer->email,
					'fname' 				=> $Lecturer->fname,
					'lname' 				=> $Lecturer->lname,
					'contact'				=> $Lecturer->contact,
					'rolename'				=> $Lecturer->role,
					'a_no'					=> $Lecturer->a_no,
					'a_street'				=> $Lecturer->a_street,
					'a_city'				=> $Lecturer->a_city,
					'a_country'				=> $Lecturer->a_country,
					'company_designation'	=> $Lecturer->company_designation,
					'full_img'				=> $Lecturer->full_img,
					'industry_category'		=> $Lecturer->industry_category,
					'education_level'		=> $Lecturer->education_level,
					'status'				=> $Lecturer->status,
					'admin_confirm'			=> $Lecturer->admin_confirm,
					'summary'				=> $Lecturer->summary,
				);
			}
			
			return $return;
		}

		function getLecturerToDisplay(){
			
			$query = $this->db->query("SELECT * FROM `lecturer` WHERE status = '1'");
			$return = array();
			
			while($Lecturer = $this->db->fetchNextObject($query)){
				
				$return[] = array(
					'id' 					=> $Lecturer->lecturer_id,
					'email' 				=> $Lecturer->email,
					'fname' 				=> $Lecturer->fname,
					'lname' 				=> $Lecturer->lname,
					'contact'				=> $Lecturer->contact,
					'rolename'				=> $Lecturer->role,
					'a_no'					=> $Lecturer->a_no,
					'a_street'				=> $Lecturer->a_street,
					'a_city'				=> $Lecturer->a_city,
					'a_country'				=> $Lecturer->a_country,
					'company_designation'	=> $Lecturer->company_designation,
					'company_name'	=> $Lecturer->company_name,
					'full_img'				=> $Lecturer->full_img,
					'thumb_img'				=> $Lecturer->thumb_img,
					'industry_category'		=> $Lecturer->industry_category,
					'education_level'		=> $Lecturer->education_level,
					'status'				=> $Lecturer->status,
					'admin_confirm'			=> $Lecturer->admin_confirm,
					'summary'				=> $Lecturer->summary,
				);
			}
			
			return $return;
		}
	
	/** Get the  Lecturer dropdown.
      * 
      * @return Return string with html dorpdown.
      */
	function getLecturerDropDown($selected = 0){
		$get = $this->db->query("SELECT * FROM `lecturer` WHERE status = '1'");
		$data = array();
		
		while($line = $this->db->fetchNextObject($get)){
			$data[$line->lecturer_id]= $line->fname .' '. $line->lname;
		}
		
		return $data;
	}
	
	
	function getLecturerRoleName($rid){
		return $this->db->queryUniqueValue("SELECT name FROM Lecturer_roles WHERE role = '" . $rid . "'");
		}
	
	/** Get the all Lecturer id.
      * 
      * @return Return Int.
      */
	function getEID()
	{
		return (int)$_SESSION['eid'];
	}
	
	/** Get the Lecturer name by id
      * @param $eid Lecturer id which want to get name.
      * @return Return String Name
      */
	function getLecturerName($eid){
		return $this->db->queryUniqueObject("SELECT * from `lecturer` WHERE lecturer_id = " . $eid);
	}

	/** update the specific Lecturer
      * @param $lid Lecturer id which want to update.
      * @return Return bool
      */
	function sendLecturer($lid){
		$this->db->query("UPDATE `lecturer` SET admin_confirm = 'Sent' WHERE lecturer_id = ". mysql_real_escape_string($lid));
		return true;
	}

	/** Get the all bookings details.
      * 
      * @return Return array with bookings details.
      */
	function getBookingnames($eid){
			
		$query = $this->db->query("SELECT * FROM `event_attend` WHERE event_id = ". mysql_real_escape_string($eid));
		$return = array();
		
		while($users = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'event_id' 		=> $users->event_id,
				'userid' 		=> $users->user_id,
				'userrole' 		=> $users->user_role,
				'users_fname' 	=> $this->getUserFName($users->user_id, $users->user_role),
				'users_lname' 	=> $this->getUserLName($users->user_id, $users->user_role),
			);
		}
		
		return $return;
	}

	function getUserFName($uid,$user_role){

		if ($user_role = 'Administrator' or $user_role = 'Organizer') {
			return $this->db->queryUniqueValue("SELECT fname from `user` WHERE user_id = " . $uid);
		}
		elseif ($user_role = 'Lecturer') {
			return $this->db->queryUniqueValue("SELECT fname from `lecturer` WHERE lecturer_id = " . $uid);
		}
		else{
			return $this->db->queryUniqueValue("SELECT fname from `deleget` WHERE deleget_id = " . $uid);
		}		
		
	}

	function getUserLName($uid,$user_role){

		if ($user_role = 'Administrator' or $user_role = 'Organizer') {
			return $this->db->queryUniqueValue("SELECT lname from `user` WHERE user_id = " . $uid);
		}
		if ($user_role = 'Lecturer') {
			return $this->db->queryUniqueValue("SELECT lname from `lecturer` WHERE lecturer_id = " . $uid);
		}
		else{
			return $this->db->queryUniqueValue("SELECT lname from `deleget` WHERE deleget_id = " . $uid);
		}
		
	}
			
}
?>
