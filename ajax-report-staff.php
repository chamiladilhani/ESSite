<?php

include('header_includes.php');

$con = mysql_connect('localhost','root','') or die("Could not connect database");
mysql_select_db('es-db', $con) or die("Could not select database");

//############# Staff Filter Details Start Here...
if (!empty($_POST['sRole'])) {
		
	$query = "SELECT * FROM `user` WHERE role = '".$_POST['sRole']."' order by user_id";
	$result = mysql_query($query) or die(mysql_error());$num_row = mysql_num_rows($result);

	if ($num_row >=1) {	

		echo "
		<table style='border:1px solid #666;padding:5px;background:#fff'>
		<tr>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>#</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Name</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Email</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Role</th>
		</tr>";

		while($row = mysql_fetch_array($result))
		{
			echo "<tr>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['user_id']."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['fname'].' '.$row['lname']."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['email']."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['role']."</td>";
			echo "</tr>";
		}
		echo "</table>";		
	}
	else{

		$query = "SELECT * FROM `lecturer` WHERE role = '".$_POST['sRole']."' order by lecturer_id";
		$result = mysql_query($query) or die(mysql_error());$num_row = mysql_num_rows($result);

		if ($num_row >=1) {	

			echo "
			<table style='border:1px solid #666;padding:5px;background:#fff'>
			<tr>
			<th style='border:1px solid #666;padding:5px;background:#aaa'>#</th>
			<th style='border:1px solid #666;padding:5px;background:#aaa'>Name</th>
			<th style='border:1px solid #666;padding:5px;background:#aaa'>Email</th>
			<th style='border:1px solid #666;padding:5px;background:#aaa'>Role</th>
			</tr>";

			while($row = mysql_fetch_array($result))
			{
				echo "<tr>";
				echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['lecturer_id']."</td>";
				echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['fname'].' '.$row['lname']."</td>";
				echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['email']."</td>";
				echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['role']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else{
			echo "No Data.";
		}
	}
	
}

?>
