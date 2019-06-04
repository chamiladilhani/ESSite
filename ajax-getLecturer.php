<?php

include('header_includes.php');

$ehour = $_GET['ehour'];
$ehour_to = $_GET['ehour_to'];
$edate = $_GET['edate'];
$electurer = $_GET['electurer'];

$con = mysql_connect('localhost','root','') or die("Could not connect database");
mysql_select_db('es-db', $con) or die("Could not select database");

$query = "SELECT * FROM `event` WHERE electurer = '".$electurer."' AND edate = '".$edate."'";

$result = mysql_query($query) or die(mysql_error());
$num_row = mysql_num_rows($result);

if ($num_row >=1) {

	$query = "SELECT * FROM `event` WHERE edate = '".$edate."' and electurer = ".$electurer." and ((ehour between ".$ehour." and ".$ehour_to.") or (ehour_to between ".$ehour." and ".$ehour_to.")) ";

	$result = mysql_query($query) or die(mysql_error());
	$num_row = mysql_num_rows($result);

	if ($num_row >=1) {
		echo "<p style='color:red'>Lecturer unvailable. Please select another time period.</p>";

		$query2 = "SELECT * FROM `lecturer` WHERE lecturer_id = '".$electurer."'";
		$result2 = mysql_query($query2) or die(mysql_error());
		$row2 = mysql_fetch_array($result2);

		echo "<table style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>
		<tr>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>Lecturer Name</th>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>Date</th>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>Start Time</th>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>End Time</th>
		</tr>";
	
		while($row = mysql_fetch_array($result))
		  {
		  echo "<tr>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row2['fname'] . " " . $row2['lname'] . "</td>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row['edate'] . "</td>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row['ehour'] . ":" . $row['eminute'] . "</td>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row['ehour_to'] . ":" . $row['eminute_to'] . "</td>";
		  echo "</tr>";
		  }
		echo "</table>";
	}
	else{
		echo "<p style='color:green'>Lecturer available for selected time period.</p>";
	}
}
else{
	echo "<p style='color:green'>Lecturer available for selected time period.</p>";
}







mysql_close($con);
?>
