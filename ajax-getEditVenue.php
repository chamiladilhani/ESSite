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

	$city_reult = mysql_query("select * from `resource` where location_id = '$udata' order by name asc ");

	$event_reult = mysql_query("select * from `event` where id = '$eventid' ");	
	if (mysql_num_rows($event_reult) > 0) {
		$event_data = mysql_fetch_assoc($event_reult);
	}

	if(mysql_num_rows($city_reult) > 0)
	{
		echo '<label for="">Venue <i>*</i></label>';
		echo '<select required name="evenue" id="evenue" onchange="showSeats()">';
		echo '<option value="">-Select-</option>';
		
		while($city_data = mysql_fetch_assoc($city_reult))
		{
			if ($city_data['name'] == $event_data['evenue']) {
				echo '<option value="'.$city_data['id'].'" selected="selected" >'.$city_data['name'].'</option>';
			}
			else{
				echo '<option value="'.$city_data['id'].'">'.$city_data['name'].'</option>';
			}			
		}
		echo '</select><div style="" id="ajaxDiv2"></div>';
	}
	else{
		echo '<p style="color:red">No Data.</p>';
	}
}
else{
	echo '<p style="color:red">Please select an option.</p>';
}
?>