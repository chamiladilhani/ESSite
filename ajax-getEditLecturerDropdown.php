<?php
$mysql_host = "localhost";
$mysql_database = "es-db";
$mysql_user = "root";
$mysql_password = "";

mysql_connect("$mysql_host", "$mysql_user", "$mysql_password");
mysql_select_db($mysql_database);

if(!empty($_POST['udata']) && !empty($_POST['eventid'])){
	$udata = $_POST['udata'];
	$eventid = $_POST['eventid'];

	$city_reult = mysql_query("select * from `lecturer` where industry_category = '$udata' order by lecturer_id asc ");

	$event_reult = mysql_query("select * from `event` where id = '$eventid' ");	
	if (mysql_num_rows($event_reult) > 0) {
		$event_data = mysql_fetch_assoc($event_reult);
	}

	if(mysql_num_rows($city_reult) > 0)
	{
		echo '<label for="">Lecturer <i>*</i></label> ';
		echo '<select required name="electurer" id="electurer">';
		echo '<option value="">-Select-</option>';
		
		while($city_data = mysql_fetch_assoc($city_reult))
		{
			if ($city_data['lecturer_id'] == $event_data['electurer']) {
				echo '<option value="'.$city_data['lecturer_id'].'" selected="selected" >'.$city_data['fname'].' '.$city_data['lname'].'</option>';
			}
			else{
				echo '<option value="'.$city_data['lecturer_id'].'">'.$city_data['fname'].' '.$city_data['lname'].'</option>';
			}			
		}
		echo '</select>';
	}
	else{
		echo '<p style="color:red">No Data.</p>';
	}
}
else{
	echo '<p style="color:red">Please select an option.</p>';
}
?>