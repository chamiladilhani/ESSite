<?php

/**
 * User Class - Handle the all User related processes.
 * @package Es-site
 */
class User
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
	function User()
	{
		$this->db = new DB();
		$this->uid = 0;
		
	}
	
	/** Logout User - Destroy the session and redirect to the login page.
      *
      * @return Void
      */
	function logout()
	{
		$this->db->execute("UPDATE user_sessions SET logout = now() WHERE id = '".$_SESSION['sessionid']."'");
		session_destroy();
		header("location:index.php");
	}
	
	/** Get User Groups
      *
      * @return array.
      */
	function getRoles(){
		
		$return;
		$this->db->query("SELECT id, name FROM `user_group` where name!='Deleget' and name!= 'Lecturer'");
		
			while($line = $this->db->fetchNextObject()){
				$return[$line->name] = $line->name;
			}
		return $return;
		}

	/** Add the new User
      * @param $data The values in array.
      * @return Return true always.
      */	
	function add($data)
	{
		$data['password'] = md5($data['password']);
		$return = $this->db->query("INSERT INTO `user` (".array2keys($data).",`rdate`) VALUES (".array2values($data).",now())");
		return true;
	}
	
	/** Edit the specific customer
      * @param $eid User id which want to edit.
	  * @param $data The values in array.
      * @return Return bool
      */
	function edit($uid, $data){
		$data['password'] = md5($data['password']);
		$this->db->query("UPDATE `user` SET ".array2update($data)." WHERE user_id = ". mysql_real_escape_string($uid));
		return true;
	}	

	function getUserEligibility($uid)
	{		
		$details = $this->db->queryUniqueObject("SELECT * FROM `deleget` WHERE deleget_id=". mysql_real_escape_string($uid) );
		return $details;
	}
	
	/** Delete a specfic Users
      * @param $data The User id's as array which needs to delete.
      * @return Return True
      */
	function delete($data)
		{		
			$this->db->query("DELETE FROM `user` WHERE user_id=".$data." LIMIT 1");		
		}	

	/** Get the all User id.
      * 
      * @return Return Int.
      */
	function getUID()
	{
		return (int)$_SESSION['uid'];
	}

	/** Get the specific User's details.
      * @param $eid User id.
      * @return Return data object
      */
	function getUserDetails($uid = 0)
	{
		if($uid == 0){
			$uid = $this->getUID();
		}
		$get = $this->db->query("SELECT * FROM `user` WHERE user_id=". mysql_real_escape_string($uid) );
		$getDet = $this->db->fetchNextObject($get);
		return $getDet;
	}

	function getUsersDetails($uid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `user` WHERE user_id=". mysql_real_escape_string($uid) );
		return $details;
	}

	function getLecturersDetails($uid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `lecturer` WHERE lecturer_id=". mysql_real_escape_string($uid) );
		return $details;
	}

	function getDelegetsDetails($uid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `deleget` WHERE deleget_id=". mysql_real_escape_string($uid) );
		return $details;
	}

	function getGroupDetails($uid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `user_group` WHERE id=". mysql_real_escape_string($uid) );
		return $details;
	}

	function getAllGroupDetails()
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `user_group`");
		return $details;
	}


	/** Add the new User
      * @param $data The values in array.
      * @return Return true always.
      */	
	function addGroup($data)
	{
		$return = $this->db->query("INSERT INTO `user_group` (".array2keys($data).") VALUES (".array2values($data).")");
		return true;
	}

	function addEventMultimedia($data,$eid)
	{
		foreach($data as $choice){
			$this->db->query("INSERT INTO `event_multimedia` (`mid`,`eid`) VALUES (".$choice.",".$eid.")");
		    //mysql_query("insert into tb values('','$choice')");
		}
		//$return = 
		return true;
	}

	/** Get the all UserGroup details.
      * 
      * @return Return array with UserGroup details.
      */
	function getUserGroup(){
			
		$query = $this->db->query("SELECT * FROM `user_group`");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 		=> $user->id,
				'name' 		=> $user->name
			);
		}		
		return $return;
	}

	/** Delete a specfic UserGroup
      * @param $data The UserGroup id's as array which needs to delete.
      * @return Return True
      */
	function deleteUserGroup($data)
		{		
			$this->db->query("DELETE FROM `user_group` WHERE id=".$data." LIMIT 1");		
		}	
	
	/** Get the all User details.
      * 
      * @return Return array with User details.
      */
	function getUser(){
			
		$query = $this->db->query("SELECT * FROM `user`");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->user_id,
				'email' 		=> $user->email,
				'fname' 		=> $user->fname,
				'lname' 		=> $user->lname,
				'role'			=> $user->role,
			);
		}
		
		return $return;
	}
	
	/** Get the  User dropdown.
      * 
      * @return Return string with html dorpdown.
      */
	function getUserDropDown($selected = 0){
		$get = $this->db->query("select * from user");
		$data = array();
		
		while($line = $this->db->fetchNextObject($get)){
			$data[$line->id]= $line->fname .' '. $line->lname;
		}
		
		return $data;
	}

	function getUserGroupDropDown($selected = 0){
		$get = $this->db->query("select * from `user_group`");
		$data = array();
		
		while($line = $this->db->fetchNextObject($get)){

			if ($line->name != "Deleget") {
				$data[$line->name]= $line->name;
			}		
		}
		
		return $data;
	}

	/** Get the  Subject dropdown.
      * 
      * @return Return string with html dorpdown.
      */
	function getSubjectDropDown($selected = 0){
		$get = $this->db->query("SELECT * FROM `subject`");
		$data = array();
		
		while($line = $this->db->fetchNextObject($get)){
			$data[$line->id]= $line->name;
		}
		
		return $data;
	}

	/** Get the  Room dropdown.
      * 
      * @return Return string with html dorpdown.
      */
	function getRoomDropDown($selected = 0){
		$get = $this->db->query("SELECT * FROM `resource` WHERE type = 'Room'");
		$data = array();
		
		while($line = $this->db->fetchNextObject($get)){
			$data[$line->id]= $line->name;
		}
		
		return $data;
	}

	function getMultimediaDropDown($selected = 0){
		$get = $this->db->query("SELECT * FROM `resource` WHERE type = 'Multimedia'");
		$data = array();
		
		while($line = $this->db->fetchNextObject($get)){
			$data[$line->id]= $line->name;
		}
		
		return $data;
	}

	/** Get the  Eligibility dropdown.
      * 
      * @return Return string with html dorpdown.
      */
	function getEligibilityDropDown($selected = 0){
		$get = $this->db->query("SELECT * FROM `eligibility`");
		$data = array();
		
		while($line = $this->db->fetchNextObject($get)){
			$data[$line->id]= $line->name;
		}
		
		return $data;
	}	

	function getEligibilityDropDownToLecturer($selected = 0){
		$get = $this->db->query("SELECT * FROM `eligibility` WHERE groups != 'Student' ");
		$data = array();
		
		while($line = $this->db->fetchNextObject($get)){
			$data[$line->id]= $line->name;
		}
		
		return $data;
	}

	function getSupportDropDown($selected = 0){
		$get = $this->db->query("SELECT * FROM `user` WHERE role = 'Support' ");
		$data = array();
		
		while($line = $this->db->fetchNextObject($get)){
			$data[$line->user_id]= $line->fname.' '.$line->lname;
		}
		
		return $data;
	}

	/** Get the  location dropdown.
      * 
      * @return Return string with html dorpdown.
      */
	function getLocationDropDown($selected = 0){
		$get = $this->db->query("SELECT * FROM `resource` WHERE type = 'Location'");
		$data = array();
		
		while($line = $this->db->fetchNextObject($get)){
			$data[$line->id]= $line->name;
		}
		
		return $data;
	}

	function getEventDropDownToSendMail($selected = 0){
		$get = $this->db->query("SELECT * FROM `event` WHERE publish = '1' AND cancel_note = '' AND edate >= CURDATE() ORDER BY publish_date DESC");
		$data = array();
		
		while($line = $this->db->fetchNextObject($get)){
			$data[$line->id]= $line->ename;
		}
		
		return $data;
	}

	/** Get the  event dropdown.
      * 
      * @return Return string with html dorpdown.
      */
	function getEventDropDown($selected = 0){
		$get = $this->db->query("SELECT * FROM `event` WHERE publish = '1' ");
		$data = array();
		
		while($line = $this->db->fetchNextObject($get)){
			$data[$line->id]= $line->ename;
		}
		
		return $data;
	}

	function getDelegetMails($category){
		 

		$query = $this->db->query("SELECT * FROM `deleget` WHERE industry_category = '".$category."' order by email DESC");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'deleget_id' 	=> $user->deleget_id,
				'email' 		=> $user->email
			);
		}		
		return $return;
	}	
	
	function getUserRoleName($rid){
		return $this->db->queryUniqueValue("SELECT name FROM user_roles WHERE role = '" . $rid . "'");
	}	
	
	/** Get the User name by id
      * @param $eid User id which want to get name.
      * @return Return String Name
      */
	function getUserName($eid){
		return $this->db->queryUniqueObject("SELECT fname,lname from User WHERE id = " . $eid);
	}

	/** Add the new Resources
      * @param $data The values in array.
      * @return Return true always.
      */	
	function addResources($data)
	{
		$return = $this->db->query("INSERT INTO `resource` (".array2keys($data).") VALUES (".array2values($data).")");
		return true;
	}

	/** Delete a specfic Resource
      * @param $data The Resource id's as array which needs to delete.
      * @return Return True
      */
	function deleteResources($data)
		{		
			$this->db->query("DELETE FROM `resource` WHERE id=".$data." LIMIT 1");		
		}

	/** Edit the specific Resource
      * @param $rid Resource id which want to edit.
	  * @param $data The values in array.
      * @return Return bool
      */
	function resourceEdit($rid, $data){
		$this->db->query("UPDATE `resource` SET ".array2update($data)." WHERE id = ". mysql_real_escape_string($rid));
		return true;
	}

	function editSubject($sid, $data){
		$this->db->query("UPDATE `subject` SET ".array2update($data)." WHERE id = ". mysql_real_escape_string($sid));
		return true;
	}

	function editEligibility($aid, $data){
		$this->db->query("UPDATE `eligibility` SET ".array2update($data)." WHERE id = ". mysql_real_escape_string($aid));
		return true;
	}

	function getResourceDetails($rid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `resource` WHERE id=". mysql_real_escape_string($rid) );
		return $details;
	}

	function getSubjectDetails($sid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `subject` WHERE id=". mysql_real_escape_string($sid) );
		return $details;
	}

	function getEligibilityDetails($aid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `eligibility` WHERE id=". mysql_real_escape_string($aid) );
		return $details;
	}

	/** Get the all Resource details.
      * 
      * @return Return array with Resource details.
      */
	function getResources(){
			
		$query = $this->db->query("SELECT * FROM `resource`");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'type' 			=> $user->type,
				'name' 			=> $user->name,
				'no_of_seats' 	=> $user->no_of_seats,
				'location' 		=> $this->getLocName($user->location_id),
				'description' 	=> $user->description,
			);
		}
		
		return $return;
	}

	function getLocName($lid)
	{
		$details = $this->db->queryUniqueValue("SELECT name FROM `resource` WHERE id=". mysql_real_escape_string($lid) );
		return $details;
	}

	function getEligibleName($eid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `eligibility` WHERE id=". mysql_real_escape_string($eid) );
		return $details;
	}

	function getLocationName($lid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `resource` WHERE id=". mysql_real_escape_string($lid) );
		return $details;
	}

	function getVenueName($vid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `resource` WHERE id=". mysql_real_escape_string($vid) );
		return $details;
	}

	function getSubjectName($sid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `subject` WHERE id=". mysql_real_escape_string($sid) );
		return $details;
	}

	/** cancel the specific event
      * @param $eid event id which want to cancel.
	  * @param $data The values in array.
      * @return Return bool
      */
	function cancelEvent($eid, $data){
		$this->db->query("UPDATE `event` SET ".array2update($data)." WHERE id = ". mysql_real_escape_string($eid));
		return true;
	}

	/** undo the specific Event cancel
      * @param $eid Event id which want to update.
      * @return Return bool
      */
	function undoCancel($eid){
		$this->db->query("UPDATE `event` SET cancel_note = '' WHERE id = ". mysql_real_escape_string($eid));
		return true;
	}

	/** Add the new Subject
      * @param $data The values in array.
      * @return Return true always.
      */	
	function addSubject($data)
	{
		$return = $this->db->query("INSERT INTO `subject` (".array2keys($data).") VALUES (".array2values($data).")");
		return true;
	}

	/** Delete a specfic Subject
      * @param $data The Subject id's as array which needs to delete.
      * @return Return True
      */
	function deleteSubject($data)
		{		
			$this->db->query("DELETE FROM `subject` WHERE id=".$data." LIMIT 1");		
		}

	/** Get the all Subject details.
      * 
      * @return Return array with Subject details.
      */
	function getSubject(){
			
		$query = $this->db->query("SELECT * FROM `subject`");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'name' 			=> $user->name
			);
		}
		
		return $return;
	}

	function getLecturers($sid){
			
		$query = $this->db->query("SELECT * FROM `lecturer` WHERE industry_category = ".mysql_real_escape_string($sid));
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

	/** Add the new Eligibility
      * @param $data The values in array.
      * @return Return true always.
      */	
	function addEligibility($data)
	{
		$return = $this->db->query("INSERT INTO `eligibility` (".array2keys($data).") VALUES (".array2values($data).")");
		return true;
	}

	/** Delete a specfic Eligibility
      * @param $data The Eligibility id's as array which needs to delete.
      * @return Return True
      */
	function deleteEligibility($data)
		{		
			$this->db->query("DELETE FROM `eligibility` WHERE id=".$data." LIMIT 1");		
		}

	/** Get the all Eligibility details.
      * 
      * @return Return array with Eligibility details.
      */
	function getEligibility(){
			
		$query = $this->db->query("SELECT * FROM `eligibility`");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'name' 			=> $user->name,
			);
		}
		
		return $return;
	}

	/** Add the new Event
      * @param $data The values in array.
      * @return Return true always.
      */	
	function addEvent($data)
	{
		$return = $this->db->query("INSERT INTO `event` (".array2keys($data).") VALUES (".array2values($data).")");
		return mysql_insert_id();
		
	}

	function updateEvent($eid,$data)
	{
		$return = $this->db->query("UPDATE `event` SET ".array2update($data)." WHERE id = ". mysql_real_escape_string($eid));
		return true;
	}

	/** Update the specific Event
      * @param $eid Event id which want to update.
      * @return Return bool
      */
	function publishedEvent($eid){
		$this->db->query("UPDATE `event` SET publish = '1', publish_date = now()  WHERE id = ". mysql_real_escape_string($eid));
		return true;
	}

	/** Update the specific Event
      * @param $eid Event id which want to update.
      * @return Return bool
      */
	function publishedUndoEvent($eid){
		$this->db->query("UPDATE `event` SET publish = '0', publish_date = ''  WHERE id = ". mysql_real_escape_string($eid));
		return true;
	}

	/** Delete a specfic Event
      * @param $data The Event id's as array which needs to delete.
      * @return Return True
      */
	function deleteEvent($data)
		{		
			$this->db->query("DELETE FROM `event` WHERE id=".$data." LIMIT 1");		
		}

	/** Get the all Event details.
      * 
      * @return Return array with Event details.
      */

	function getEvent(){
			
		$query = $this->db->query("SELECT * FROM `event` ORDER BY publish_date");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'ename' 		=> $user->ename,
				'ecategory' 	=> $user->ecategory,
				'ecategory_id' 	=> $user->ecategory_id,
				'electurer' 	=> $user->electurer,
				'edate' 		=> $user->edate,
				'ehour' 		=> $user->ehour,
				'eminute' 		=> $user->eminute,
				'etimetype' 	=> $user->etimetype,
				'evenue' 		=> $user->evenue,
				'eeligibility' 	=> $user->eeligibility,
				'publish' 		=> $user->publish,
				'publish_date' 	=> $user->publish_date,
				'full_img' 		=> $user->full_img,
				'thumb_img' 	=> $user->thumb_img,
				'edescription' 	=> $user->edescription,
				'cancel_note' 	=> $user->cancel_note,
				'organizer_name' 	=> $user->organizer_name,
				'organizer_id' 	=> $user->organizer_id,
			);
		}
		
		return $return;
	}

	function getEventSlider(){
			
		$query = $this->db->query("SELECT * FROM `event` WHERE publish = '1' AND cancel_note = '' AND edate >= CURDATE() ORDER BY publish_date DESC LIMIT 12");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'ename' 		=> $user->ename,
				'ecategory' 	=> $user->ecategory,
				'ecategory_id' 	=> $user->ecategory_id,
				'electurer' 	=> $user->electurer,
				'edate' 		=> $user->edate,
				'ehour' 		=> $user->ehour,
				'eminute' 		=> $user->eminute,
				'ehour_to' 		=> $user->ehour_to,
				'eminute_to' 	=> $user->eminute_to,
				'etimetype' 	=> $user->etimetype,
				'evenue' 		=> $user->evenue,
				'eeligibility' 	=> $user->eeligibility,
				'publish' 		=> $user->publish,
				'publish_date' 	=> $user->publish_date,
				'full_img' 		=> $user->full_img,
				'thumb_img' 	=> $user->thumb_img,
				'edescription' 	=> $user->edescription,
			);
		}
		
		return $return;
	}

	function getEventsRow(){
			
		$query = $this->db->query("SELECT * FROM `event` WHERE publish = '1' AND edate >= CURDATE() ORDER BY publish_date DESC");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'ename' 		=> $user->ename,
				'ecategory' 	=> $user->ecategory,
				'ecategory_id' 	=> $user->ecategory_id,
				'electurer' 	=> $user->electurer,
				'edate' 		=> $user->edate,
				'ehour' 		=> $user->ehour,
				'eminute' 		=> $user->eminute,
				'ehour_to' 		=> $user->ehour_to,
				'eminute_to' 	=> $user->eminute_to,
				'etimetype' 	=> $user->etimetype,
				'evenue' 		=> $user->evenue,
				'eligibility_id' 	=> $user->eligibility_id,
				'edescription' 	=> $user->edescription,
				'publish' 		=> $user->publish,
				'publish_date' 	=> $user->publish_date,
				'full_img' 		=> $user->full_img,
				'thumb_img' 	=> $user->thumb_img,
				'cancel_note' 	=> $user->cancel_note,
				'organizer_id' 	=> $user->organizer_id,
				'organizer_name' 	=> $user->organizer_name,
			);
		}
		
		return $return;
	}

	function getPastEventsRow(){
			
		$query = $this->db->query("SELECT * FROM `event` WHERE publish = '1' AND edate < CURDATE() ORDER BY publish_date ASC");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'ename' 		=> $user->ename,
				'ecategory' 	=> $user->ecategory,
				'ecategory_id' 	=> $user->ecategory_id,
				'electurer' 	=> $user->electurer,
				'edate' 		=> $user->edate,
				'ehour' 		=> $user->ehour,
				'eminute' 		=> $user->eminute,
				'etimetype' 	=> $user->etimetype,
				'evenue' 		=> $user->evenue,
				'eligibility_id' 	=> $user->eligibility_id,
				'edescription' 	=> $user->edescription,
				'publish' 		=> $user->publish,
				'publish_date' 	=> $user->publish_date,
				'full_img' 		=> $user->full_img,
				'thumb_img' 	=> $user->thumb_img,
				'cancel_note' 	=> $user->cancel_note,
			);
		}
		
		return $return;
	}

	function getPastEventsView(){
			
		$query = $this->db->query("SELECT * FROM `event` WHERE publish = '1' ORDER BY publish_date ASC");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'ename' 		=> $user->ename,
				'ecategory' 	=> $user->ecategory,
				'ecategory_id' 	=> $user->ecategory_id,
				'electurer' 	=> $user->electurer,
				'edate' 		=> $user->edate,
				'ehour' 		=> $user->ehour,
				'eminute' 		=> $user->eminute,
				'ehour_to' 		=> $user->ehour_to,
				'eminute_to' 	=> $user->eminute_to,
				'etimetype' 	=> $user->etimetype,
				'evenue' 		=> $user->evenue,
				'eeligibility' 	=> $user->eeligibility,
				'edescription' 	=> $user->edescription,
				'publish' 		=> $user->publish,
				'publish_date' 	=> $user->publish_date,
				'full_img' 		=> $user->full_img,
				'thumb_img' 	=> $user->thumb_img,
				'cancel_note' 	=> $user->cancel_note,
				'organizer_id' 	=> $user->organizer_id,
				'organizer_name' 	=> $user->organizer_name,
			);
		}
		
		return $return;
	}

	function getSubjectEvents($sid){
			
		$query = $this->db->query("SELECT * FROM `event` WHERE publish = '1' AND cancel_note = '' AND ecategory_id = '$sid' AND edate >= CURDATE() ORDER BY publish_date DESC");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'ename' 		=> $user->ename,
				'ecategory' 	=> $user->ecategory,
				'ecategory_id' 	=> $user->ecategory_id,
				'electurer' 	=> $user->electurer,
				'edate' 		=> $user->edate,
				'ehour' 		=> $user->ehour,
				'eminute' 		=> $user->eminute,
				'ehour_to' 		=> $user->ehour_to,
				'eminute_to' 	=> $user->eminute_to,
				'etimetype' 	=> $user->etimetype,
				'evenue' 		=> $user->evenue,
				'eeligibility' 	=> $user->eeligibility,
				'edescription' 	=> $user->edescription,
				'publish' 		=> $user->publish,
				'publish_date' 	=> $user->publish_date,
				'full_img' 		=> $user->full_img,
				'thumb_img' 	=> $user->thumb_img,
				'cancel_note' 	=> $user->cancel_note,
				'organizer_id' 	=> $user->organizer_id,
				'organizer_name' 	=> $user->organizer_name,
			);
		}
		
		return $return;
	}

	function getLecturerTimetable($lid){
			
		$query = $this->db->query("SELECT * FROM `event` WHERE publish = '1' AND cancel_note = '' AND electurer = '$lid' AND edate >= CURDATE() ORDER BY publish_date DESC");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'ename' 		=> $user->ename,
				'ecategory' 	=> $user->ecategory,
				'ecategory_id' 	=> $user->ecategory_id,
				'electurer' 	=> $user->electurer,
				'edate' 		=> $user->edate,
				'ehour' 		=> $user->ehour,
				'eminute' 		=> $user->eminute,
				'ehour_to' 		=> $user->ehour_to,
				'eminute_to' 	=> $user->eminute_to,
				'etimetype' 	=> $user->etimetype,
				'evenue' 		=> $user->evenue,
				'eeligibility' 	=> $user->eeligibility,
				'edescription' 	=> $user->edescription,
				'publish' 		=> $user->publish,
				'publish_date' 	=> $user->publish_date,
				'full_img' 		=> $user->full_img,
				'thumb_img' 	=> $user->thumb_img,
				'cancel_note' 	=> $user->cancel_note,
				'organizer_id' 	=> $user->organizer_id,
				'organizer_name' 	=> $user->organizer_name,
			);
		}
		
		return $return;
	}

	/** Get the all Event details.
      * 
      * @return Return object with Event details.
      */
	function getEventDetails($eid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `event` WHERE id=". mysql_real_escape_string($eid) );
		return $details;
	}

	function getCommentUser($uid,$role)
	{
		if ($role == 'Administrator' || $role == 'Organizer') {
			 $details = $this->db->queryUniqueObject("SELECT * FROM `user` WHERE user_id=". mysql_real_escape_string($uid) );
			return $details;
		}
		elseif ($role == 'Lecturer') {
			 $details = $this->db->queryUniqueObject("SELECT * FROM `lecturer` WHERE lecturer_id=". mysql_real_escape_string($uid) );
			return $details;
		}
		else {
			 $details = $this->db->queryUniqueObject("SELECT * FROM `deleget` WHERE deleget_id=". mysql_real_escape_string($uid) );
			return $details;
		}	
       
        	
	}

	/** Get the all room details.
      * 
      * @return Return array with room details.
      */
	function getRooms(){
			
		$query = $this->db->query("SELECT * FROM `resource` WHERE type = 'Room'");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'type' 			=> $user->type,
				'name' 			=> $user->name,
				'no_of_seats' 	=> $user->no_of_seats,
				'location_id' 	=> $user->location_id,
				'description' 	=> $user->description,
				'location_name' => $this->getLocName($user->location_id),

			);
		}
		
		return $return;
	}

	function addNews($data)
	{
		$return = $this->db->query("INSERT INTO `news` (".array2keys($data).",`publish`) VALUES (".array2values($data).",now())");
		return true;
	}

	function deleteNews($data)
	{		
		$this->db->query("DELETE FROM `news` WHERE id=".$data." LIMIT 1");		
	}

	function deleteSlider($data)
	{		
		$this->db->query("DELETE FROM `slides` WHERE id=".$data." LIMIT 1");		
	}

	function editNews($nid, $data){
		$this->db->query("UPDATE `news` SET ".array2update($data)." WHERE id = ". mysql_real_escape_string($nid));
		return true;
	}

	function editSlider($sid, $data){
		$this->db->query("UPDATE `slides` SET ".array2update($data).", rdate = now() WHERE id = ". mysql_real_escape_string($sid));
		return true;
	}

	function getNewsDetails($nid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `news` WHERE id=". mysql_real_escape_string($nid) );
		return $details;
	}

	function getNews(){
			
		$query = $this->db->query("SELECT * FROM `news` order by id ASC");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'title' 		=> $user->title,
				'publish' 		=> $user->publish,
				'description' 	=> $user->description,
				'publisher_id' 	=> $user->publisher_id,
				'publisher_name' => $user->publisher_name,
				'thumb' 		=> $user->thumb,
				'full' 			=> $user->full,

			);
		}
		
		return $return;
	}

	function getSlider(){
			
		$query = $this->db->query("SELECT * FROM `slides` order by id ASC");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'title' 		=> $user->title,
				'description' 	=> $user->description,
				'thumb' 		=> $user->slide_thumb_img,
				'full' 			=> $user->slide_full_img,
				'order_no' 		=> $user->order_no,

			);
		}
		
		return $return;
	}

	function getSliderList(){
			
		$query = $this->db->query("SELECT * FROM `slides` order by order_no DESC");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'title' 		=> $user->title,
				'description' 	=> $user->description,
				'thumb' 		=> $user->slide_thumb_img,
				'full' 			=> $user->slide_full_img,
				'order_no' 		=> $user->order_no,

			);
		}
		
		return $return;
	}

	function getSliderDetails($sid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `slides` WHERE id=". mysql_real_escape_string($sid) );
		return $details;
	}

	/** Get the all multimedia details.
      * 
      * @return Return array with multimedia details.
      */
	function getMultimedia(){
			
		$query = $this->db->query("SELECT * FROM `resource` WHERE type = 'Multimedia'");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'type' 			=> $user->type,
				'name' 			=> $user->name,
				'description' 	=> $user->description,

			);
		}
		
		return $return;
	}

	function getSupporters(){
			
		$query = $this->db->query("SELECT * FROM `user` WHERE role = 'Support'");
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 		=> $user->user_id,
				'fname' 	=> $user->fname,
				'lname' 	=> $user->lname,

			);
		}
		
		return $return;
	}

	function getMultimediaName($mid){

		return $this->db->queryUniqueValue("SELECT name from `resource` WHERE id = " . $mid);
	}

	function getRoomDetails($rid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `resource` WHERE id=". mysql_real_escape_string($rid));
		return $details;
	}

	/** Update the specific Event
      * @param $eid Event id which want to update.
      * @return Return bool
      */
	function bookEvent($eid){

		$val = $this->db->queryUniqueValue("SELECT booking FROM `event` WHERE id=". mysql_real_escape_string($eid));

		$newVal = $val + 1;

		$this->db->query("UPDATE `event` SET booking = '$newVal' WHERE id = ". mysql_real_escape_string($eid));

		$this->db->query("INSERT INTO `event_attend` (`event_id`,`user_id`,`user_role`) VALUES ('".mysql_real_escape_string($eid)."','".$_SESSION['uid']."','".$_SESSION['role']."')");

		//$this->db->query("UPDATE `event_attend` SET event_id = '$eid', user_id = '".$_SESSION['uid']."', user_role = '".$_SESSION['role']."' WHERE id = ". mysql_real_escape_string($eid));
		
		return true;
	}

	function getBookingDetails($eid)
	{
		$details = $this->db->queryUniqueObject("SELECT * FROM `event_attend` WHERE event_id=". mysql_real_escape_string($eid)." and user_id=".$_SESSION['uid']." and user_role='".$_SESSION['role']."'");
		return $details;
	}

	function leaveEvent($eid){

		$val = $this->db->queryUniqueValue("SELECT booking FROM `event` WHERE id=". mysql_real_escape_string($eid));

		$newVal = $val - 1;

		$this->db->query("UPDATE `event` SET booking = '$newVal' WHERE id = ". mysql_real_escape_string($eid));

		$this->db->query("DELETE FROM `event_attend` WHERE event_id=".$eid." and user_id=".$_SESSION['uid']." LIMIT 1");	
		
		return true;
	}	

	/** Get the User name by id and role
      * @param $uid User id which want to get name.
      * @return Return String Name
      */	

	function getUserThumb($uid,$user_role){

		if ($user_role == 'Administrator' || $user_role == 'Organizer') {
			return $this->db->queryUniqueValue("SELECT thumb_img from `user` WHERE user_id = " . $uid);
		}
		elseif ($user_role == 'Lecturer') {
			return $this->db->queryUniqueValue("SELECT thumb_img from `lecturer` WHERE lecturer_id = " . $uid);
		}
		else{
			return $this->db->queryUniqueValue("SELECT thumb_img from `deleget` WHERE deleget_id = " . $uid);
		}
		
	}

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

	function getEventName($eid){

		return $this->db->queryUniqueValue("SELECT ename from `event` WHERE id = " . $eid);
	}

	function getEventStatus($eid){

		return $this->db->queryUniqueValue("SELECT publish from `event` WHERE id = " . $eid);
	}
	
	function getEventsAttends($eid){
			
		$query = $this->db->query("SELECT * FROM `event_attend` WHERE event_id = " . $eid);
		$return = array();
		
		while($user = $this->db->fetchNextObject($query)){
			
			$return[] = array(
				'id' 			=> $user->id,
				'event_id' 		=> $user->event_id,
				'user_id' 		=> $user->user_id,
				'user_role' 	=> $user->user_role,
				'email' 		=> $this->getEmail($user->user_id,$user->user_role),
			);
		}		
		return $return;
	}

	function getEmail($uid,$role){
		if ($role == 'Administrator' or $role == 'Organizer') {
			return $this->db->queryUniqueValue("SELECT email from `user` WHERE user_id = " . $uid);
		}		
		elseif ($role == 'Lecturer') {
			return $this->db->queryUniqueValue("SELECT email from `lecturer` WHERE lecturer_id = " . $uid);
		}
		else {
			return $this->db->queryUniqueValue("SELECT email from `deleget` WHERE deleget_id = " . $uid);
		}
	}

	function getRatings($event_id)
	{
		$total = $this->db->queryUniqueValue("SELECT SUM(value) FROM `lecturer_rate` WHERE event_id= $event_id");
		
		$count = $this->db->queryUniqueValue("SELECT COUNT(event_id) FROM `lecturer_rate` WHERE event_id= $event_id");
		
		if($total!==0)
		{
			$curentValue = @($total/$count);
		
			return $curentValue;
		}
		else {
			
		}		
	}

	function getCount($event_id)
	{
		
		$count = $this->db->queryUniqueValue("SELECT COUNT(event_id) FROM `lecturer_rate` WHERE event_id= $event_id");
		return $count;
	}

	function getLecturerRatings($lid)
	{
		$total = $this->db->queryUniqueValue("SELECT SUM(value) FROM `lecturer_rate` WHERE lecturer_id= $lid");
		
		$count = $this->db->queryUniqueValue("SELECT COUNT(lecturer_id) FROM `lecturer_rate` WHERE lecturer_id= $lid");
		
		if($total!==0)
		{
			$curentValue = @($total/$count);
		
			return $curentValue;
		}
		else {
			
		}		
	}

	function getLecturerCount($lid)
	{
		
		$count = $this->db->queryUniqueValue("SELECT COUNT(lecturer_id) FROM `lecturer_rate` WHERE lecturer_id= $lid");
		return $count;
	}	
	
	function isRated($eid)
	{
		$user = new User();

		$check = $this->db->query("SELECT uid,event_id FROM `lecturer_rate` WHERE uid=".$user->getUID()." and event_id= $eid");
		
		if($this->db->numRows($check)==0)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}

		
}
?>
