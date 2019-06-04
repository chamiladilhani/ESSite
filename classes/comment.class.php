<?php

/**
 * User Class - Handle the all User related processes.
 * @package Es-site
 */
class Comment
{	
	/** INTERNAL: Hold the database object.
      */
	var $db;
	
	/** INTERNAL: Hold the User ID.
      */
	var $uid;
	
	/** Constructer Method
      *
      * @return Void.
      */
	function Comment()
	{
		$this->db = new DB();
		$this->uid = 0;
		
	}		

	/** Get the User name by id and role
      * @param $uid User id which want to get name.
      * @return Return String Name
      */		
	function getUserFName($uid,$user_role){

		if ($user_role == 'Administrator' or $user_role == 'Organizer') {
			return $this->db->queryUniqueValue("SELECT fname from `user` WHERE user_id = " . $uid);
		}
		elseif ($user_role == 'Lecturer') {
			return $this->db->queryUniqueValue("SELECT fname from `lecturer` WHERE lecturer_id = " . $uid);
		}
		else{
			return $this->db->queryUniqueValue("SELECT fname from `deleget` WHERE deleget_id = " . $uid);
		}		
		
	}

	function getUserLName($uid,$user_role){

		if ($user_role == 'Administrator' or $user_role == 'Organizer') {
			return $this->db->queryUniqueValue("SELECT lname from `user` WHERE user_id = " . $uid);
		}
		if ($user_role == 'Lecturer') {
			return $this->db->queryUniqueValue("SELECT lname from `lecturer` WHERE lecturer_id = " . $uid);
		}
		else{
			return $this->db->queryUniqueValue("SELECT lname from `deleget` WHERE deleget_id = " . $uid);
		}
		
	}

	/** Get the all commment details.
      * 
      * @return Return array with comment details.
      */
	function getCommentRow(){
			
		$query = $this->db->query("SELECT * FROM `comments` ORDER BY add_date LIMIT 10");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'id_event' 		=> $user->id_event,
				'role' 			=> $user->role,
				'uid' 			=> $user->uid,
				'add_date' 		=> $user->add_date,
				'comment' 		=> $user->comment,
				'user_fname' 	=> $this->getUserFName($user->uid, $user->role),
				'user_lname' 	=> $this->getUserLName($user->uid, $user->role),
				'thumb_img' 	=> $this->getUserThumb($user->uid, $user->role),
				'event_name' 	=> $this->getEventName($user->id_event),
				'event_publish' => $this->getEventStatus($user->id_event),


			);
		}
		
		return $return;
	}

	function getEventName($eid){

		return $this->db->queryUniqueValue("SELECT ename from `event` WHERE id = " . $eid);
	}

	function getEventStatus($eid){

		return $this->db->queryUniqueValue("SELECT publish from `event` WHERE id = " . $eid);
	}
	
	function getUserThumb($uid,$role){

		if ($role == 'Administrator' or $role == 'Organizer') {
			return $this->db->queryUniqueValue("SELECT thumb_img from `user` WHERE user_id = " . $uid);
		}
		elseif ($role == 'Lecturer') {
			return $this->db->queryUniqueValue("SELECT thumb_img from `lecturer` WHERE lecturer_id = " . $uid);
		}
		else{
			return $this->db->queryUniqueValue("SELECT thumb_img from `deleget` WHERE deleget_id = " . $uid);
		}
		
	}

















	
	/** Get the User name by id
      * @param $eid User id
	  * @param $password user password
	  * @param $snap path to photo
      * @return Return bool
      */
	/*function markAttendance($eid, $password, $snap){
		$count  = $this->db->queryUniqueValue("SELECT COUNT(id) FROM User WHERE id = ".mysql_real_escape_string($eid)." AND password = '".mysql_real_escape_string($password)."'");
		
		if($count == 1){
			
			$isArrived = $this->db->queryUniqueValue("SELECT COUNT(arrival) FROM attendance WHERE `eid` = ".mysql_real_escape_string($eid)." AND `date` = '".date('Y-m-d')."'");
			
			if($isArrived>0){
				$this->markAttendanceOut($eid, $snap);
				return true;
			}
			else{
				$this->markAttendanceIn($eid, $snap);
				return true;
			}
		}
		else{
			MessageStack::add('attendance','Please enter a vaid password.','merror');
			return false;
		}
	}*/
	
	/** Mark Attendence Arrival
      * @param $eid User id
	  * @param $snap path to photo
      * @return Return bool
      */
	/*function markAttendanceIn($eid, $snap){
		$this->db->query("INSERT INTO attendance (`date`, `eid`, `arrival`, `depature`, `asnap`) VALUES(now(), $eid, now(), null,'$snap')");
		$time = $this->db->queryUniqueValue("SELECT arrival FROM attendance WHERE `eid` = $eid AND `date` = '".date('Y-m-d')."'");
		MessageStack::add('attendance','Arrival time marked at <strong>'.$time.'</strong>','msuccess');
		return true;
	}*/
	
	/** Mark Attendence Depature
      * @param $eid User id
	  * @param $snap path to photo
      * @return Return bool
      */
	/*function markAttendanceOut($eid, $snap){
		$this->db->query("UPDATE attendance SET `depature` = now(), `dsnap`= '$snap' WHERE `eid` = $eid AND `date` = '".date('Y-m-d')."'");
		$time = $this->db->queryUniqueValue("SELECT depature FROM attendance WHERE `eid` = $eid AND `date` = '".date('Y-m-d')."'");
		MessageStack::add('attendance','Departure time marked at <strong>'.$time.'</strong>','msuccess');
		return true;
	} */
	
	
	/** Get all attendace
      * @return Return All attendance array
      */
	/*function getAllAttendance()
	{
		$get = $this->db->query("SELECT * FROM attendance ORDER BY date, arrival");
		$data = array();
		$emp = new User();
		$i = 0;
		
		while($line = $this->db->fetchNextObject($get))
		{
			$data[$i]['eid'] = $line->eid;
			$data[$i]['date'] = $line->date;
			$data[$i]['ename'] = (array)$emp->getUserName($line->eid);
			$data[$i]['arrival'] = $line->arrival;
			$data[$i]['depature'] = $line->depature;
			$data[$i]['asnap'] = $line->asnap;
			$data[$i]['dsnap'] = $line->dsnap;
			$i++;
		}
		return $data;
	}
	
	function getUserPermissionList($selected = array()){
		
		$result = $this->db->query("SELECT * FROM User_roles_p_types ORDER BY name ASC");
		$return = '';
		
		while($line = $this->db->fetchNextObject($result)){
			$checked = in_array($line->id,$selected)?'checked="checked"':null;
			$return .= '<input type="checkbox" name="ep['.$line->id.']" ' . $checked .' /> ' . $line->name . '<br />'	;
			
		}
		
		return $return;
		
	}
	
	function updateUserPermissions($eid, $selected = array()){
		
		$this->db->execute("DELETE FROM User_permissions WHERE eid = " . mysql_real_escape_string((int)$eid));
		$data = '';
		
		foreach($selected as $k => $v){
				$data .= "($eid, $k),";
		}
		
		return (bool)$this->db->execute("INSERT INTO `User_permissions` (`eid` ,`pid`) VALUES " . substr($data, 0, -1) );
	}
	
	function getUserAccessList($eid){
		$q = $this->db->query("SELECT pid FROM `User_permissions` WHERE eid = ". mysql_real_escape_string((int)$eid) );
		$return = array();
		
		while($line = $this->db->fetchNextObject($q)){
			$return[] = $line->pid;
		}
		
		return $return;
		
	}
	
	function getPageIdFromFileName($file = ''){
		if($file==''){$file =  basename($_SERVER['SCRIPT_NAME']);}
		return $this->db->queryUniqueValue("SELECT id FROM User_roles_p_types WHERE file = '". $file . "'");
	}
	
	function checkUserPermisson($pid = 0){
		$valid = (bool) $this->db->queryUniqueValue("SELECT COUNT(eid) FROM  `User_permissions`  WHERE eid = ".$this->getEID()." AND pid = $pid");		
		
		if($valid){
			return true;	
		}
		else{
			MessageStack::add('index','Sorry, You do not have permission to view requested page.','merror');
			header("Location: index.php");
			return false; 
		}
	}*/
		
}
?>
