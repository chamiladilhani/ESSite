<?php
header('Content-type: text/json');

if (isset($_SESSION['uid'])) {
	if ($_SESSION['role']=="Lecturer") {
		
		echo '[';
		$separator = "";

		$host="localhost"; //replace with your hostname 
		$username="root"; //replace with your username 
		$password=""; //replace with your password 
		$db_name="es-db"; //replace with your database 
		$con=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$db_name")or die("cannot select DB");
		$sql = "select * from event where cancel_note = '' and publish = '1' and electurer = '".$_SESSION['uid']."' "; //replace emp_info with your table name 
		$result = mysql_query($sql);

		if(mysql_num_rows($result)){
		    while($row=mysql_fetch_array($result)){
		        $date = $row['edate'];
		        echo $separator;
		        echo '  { "date": "'.$date.' '.$row['ehour'].':'.$row['eminute'].':00", "type": "", "title": "'.$row['ename'].'", "description": "'.current(explode("\n", wordwrap($row['edescription'], 200, "...\n"))).'", "url": "event-more.php?eid='.$row['id'].'" }';
		        $separator = ",";
		    }
		}    

		echo ']';

	}
}

?>