<?php

include('header_includes.php');

$con = mysql_connect('localhost','root','') or die("Could not connect database");
mysql_select_db('es-db', $con) or die("Could not select database");

//############# Event Filter Details Start Here...
if (!empty($_POST['dEvent']) && empty($_POST['dSubject']) && empty($_POST['dEligibility'])) {
		
	$query = "SELECT * FROM `event_attend` WHERE event_id = '".$_POST['dEvent']."' order by event_id";
	$result = mysql_query($query) or die(mysql_error());$num_row = mysql_num_rows($result);

	if ($num_row >=1) {	

		echo "
		<table style='border:1px solid #666;padding:5px;background:#fff'>
		<tr>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>#</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Name</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Role</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Category</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Eligibility</th>
		</tr>";

		while($row = mysql_fetch_array($result))
		{
			$user = new User();

			
			$eventdetails = $user->getEventDetails($row['event_id']);

			$getsubject = $user->getSubjectName($eventdetails->ecategory_id);
			$geteligibility = $user->getEligibleName($eventdetails->eligibility_id);

			if ($row['user_role']=="Administrator" || $row['user_role']=="Organizer") {
				$userdetails = $user->getUsersDetails($row['user_id']);
			}
			elseif ($row['user_role']=="Lecturer") {
				$userdetails = $user->getLecturersDetails($row['user_id']);
			}
			else{
				$userdetails = $user->getDelegetsDetails($row['user_id']);
			}	

			echo "<tr>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['id']."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$userdetails->fname.' '.$userdetails->lname."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['user_role']."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$getsubject->name."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$geteligibility->name."</td>";
			echo "</tr>";
		}
		echo "</table>";		
	}
	else{
		echo "No Data.";
	}
}

//############# Subject Filter Details Start Here...
if (empty($_POST['dEvent']) && !empty($_POST['dSubject']) && empty($_POST['dEligibility'])) {
		
	$query = "SELECT * FROM `deleget` WHERE industry_category = '".$_POST['dSubject']."' order by deleget_id";
	$result = mysql_query($query) or die(mysql_error());$num_row = mysql_num_rows($result);

	if ($num_row >=1) {	

		echo "
		<table style='border:1px solid #666;padding:5px;background:#fff'>
		<tr>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>#</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Name</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Email</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Category</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Eligibility</th>
		</tr>";

		while($row = mysql_fetch_array($result))
		{
			$user = new User();

			$getsubject = $user->getSubjectName($row['industry_category']);
			$geteligibility = $user->getEligibleName($row['education_level']);

			echo "<tr>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['deleget_id']."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['fname'].' '.$row['lname']."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['email']."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$getsubject->name."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$geteligibility->name."</td>";
			echo "</tr>";
		}
		echo "</table>";		
	}
	else{
		echo "No Data.";
	}
}

//############# Eligibility Filter Details Start Here...
if (empty($_POST['dEvent']) && empty($_POST['dSubject']) && !empty($_POST['dEligibility'])) {
		
	$query = "SELECT * FROM `deleget` WHERE education_level = '".$_POST['dEligibility']."' order by deleget_id";
	$result = mysql_query($query) or die(mysql_error());$num_row = mysql_num_rows($result);

	if ($num_row >=1) {	

		echo "
		<table style='border:1px solid #666;padding:5px;background:#fff'>
		<tr>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>#</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Name</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Email</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Category</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Eligibility</th>
		</tr>";

		while($row = mysql_fetch_array($result))
		{
			$user = new User();

			$getsubject = $user->getSubjectName($row['industry_category']);
			$geteligibility = $user->getEligibleName($row['education_level']);

			echo "<tr>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['deleget_id']."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['fname'].' '.$row['lname']."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['email']."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$getsubject->name."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$geteligibility->name."</td>";
			echo "</tr>";
		}
		echo "</table>";		
	}
	else{
		echo "No Data.";
	}
}

//############# All Deleget Filter Details Start Here...
if (!empty($_POST['allDeleget'])) {
		
	$query = "SELECT * FROM `deleget` order by deleget_id";
	$result = mysql_query($query) or die(mysql_error());$num_row = mysql_num_rows($result);

	if ($num_row >=1) {	

		echo "
		<table style='border:1px solid #666;padding:5px;background:#fff'>
		<tr>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>#</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Name</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Email</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Category</th>
		<th style='border:1px solid #666;padding:5px;background:#aaa'>Eligibility</th>
		</tr>";

		while($row = mysql_fetch_array($result))
		{
			$user = new User();

			$getsubject = $user->getSubjectName($row['industry_category']);
			$geteligibility = $user->getEligibleName($row['education_level']);

			echo "<tr>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['deleget_id']."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'><a href='profile.php?delid=".$row['deleget_id']."&rol=deleget'>".$row['fname'].' '.$row['lname']."</a></td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['email']."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$getsubject->name."</td>";
			echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$geteligibility->name."</td>";
			echo "</tr>";
		}
		echo "</table>";		
	}
	else{
		echo "No Data.";
	}
}

?>
