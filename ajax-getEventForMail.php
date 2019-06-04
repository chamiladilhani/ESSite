<?php
$mysql_host = "localhost";
$mysql_database = "es-db";
$mysql_user = "root";
$mysql_password = "";

mysql_connect("$mysql_host", "$mysql_user", "$mysql_password");
mysql_select_db($mysql_database);

if(!empty($_POST['udata'])){
	$udata = $_POST['udata'];

	$event_reult = mysql_query("select * from `event` where id = '$udata' ");	

	if (mysql_num_rows($event_reult) > 0) {

		$event_data = mysql_fetch_assoc($event_reult);

		echo '<label for="">Message Title <i>*</i></label> '; 
        echo '<input type="text" id="title" name="title" value="'.$event_data['ename'].'" >';

        echo '<p><label for="">Message Content <i>*</i></label>';
		echo '<textarea id="" name="description" tabindex="5" required>'.$event_data['edescription'].'</textarea></p>';

		echo '<input type="hidden" id="category_id" name="category_id" value="'.$event_data['ecategory_id'].'" >';

		echo '<input type="hidden" id="event_id" name="event_id" value="'.$event_data['id'].'" >';
		
		$category_reult = mysql_query("select * from `deleget` where industry_category = '".$event_data['ecategory_id']."' order by email asc ");
		
		if(mysql_num_rows($category_reult) > 0){

			echo '<label for="">Recipients </label>  '; 
			echo '<input type="text" id="" name="" value="';

			while($data = mysql_fetch_assoc($category_reult))
			{
				echo $data['email'].'; ';
			}
			echo '" required placeholder="">'; 
		}
		else{
			echo '<p style="color:red">No Delegets Available.</p>';
		}       	                        	                       

        echo '<button type="submit" name="sendDeleget" id="sendDeleget" class="button-secondary pure-button">Send</button>'; 
	}
	else{
		echo '<p style="color:red">No Data.</p>';
	}
}
else{
	echo '<p style="color:red">Please select an option.</p>';
}
?>