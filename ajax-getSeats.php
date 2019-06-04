<?php

include('header_includes.php');



if (isset($_GET['evenue'])) {

	$evenue = $_GET['evenue'];

	$con = mysql_connect('localhost','root','') or die("Could not connect database");
	mysql_select_db('es-db', $con) or die("Could not select database");

	$query = "SELECT * FROM `resource` WHERE id = '".$evenue."'";

	$result = mysql_query($query) or die(mysql_error());
	$num_row = mysql_num_rows($result);

	if ($num_row >=1) {	

		echo "<table style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>
		<tr>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>#</th>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>Type</th>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>Name</th>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>No of seats</th>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>Location</th>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>Description</th>
		</tr>";

		while($row = mysql_fetch_array($result))
		  {
		  	$locName = "SELECT * FROM `resource` WHERE id = '".$row['location_id']."'";
			$resultLoc = mysql_query($locName) or die(mysql_error());
			$locrow = mysql_fetch_array($resultLoc);
		  echo "<tr>";
		   echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row['id'] . "</td>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row['type'] . "</td>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row['name'] . "</td>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row['no_of_seats'] . "</td>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $locrow['name'] . "</td>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row['description'] . "</td>";
		  echo "</tr>";
		  }
		echo "</table>";		
	}
}
if (isset($_GET['venue_name'])) {
	$venue_name = $_GET['venue_name'];

	$con = mysql_connect('localhost','root','') or die("Could not connect database");
	mysql_select_db('es-db', $con) or die("Could not select database");

	$query = "SELECT * FROM `resource` WHERE id = '".$venue_name."'";

	$result = mysql_query($query) or die(mysql_error());
	$num_row = mysql_num_rows($result);

	if ($num_row >=1) {			

		echo "<table style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>
		<tr>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>#</th>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>Type</th>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>Name</th>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>No of seats</th>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>Location</th>
		<th style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #dedede;'>Description</th>
		</tr>";

		while($row = mysql_fetch_array($result))
		  {
		  	$locName = "SELECT * FROM `resource` WHERE id = '".$row['location_id']."'";
			$resultLoc = mysql_query($locName) or die(mysql_error());
			$locrow = mysql_fetch_array($resultLoc);
			
		  echo "<tr>";
		   echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row['id'] . "</td>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row['type'] . "</td>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row['name'] . "</td>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row['no_of_seats'] . "</td>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $locrow['name'] . "</td>";
		  echo "<td style='border-width: 1px;padding: 5px;border-style: solid;border-color: #666666;background-color: #ffffff;'>" . $row['description'] . "</td>";
		  echo "</tr>";
		  }
		echo "</table>";		
	}
}

//mysql_close($con);
?>
