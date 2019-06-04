<?php

include('header_includes.php');

$con = mysql_connect('localhost','root','') or die("Could not connect database");
mysql_select_db('es-db', $con) or die("Could not select database");

//############# Lecturer Filter Details Start Here...
if (!empty($_POST['lName']) && empty($_POST['lSubject']) && empty($_POST['lEligibility'])) {

	if ($_POST['lName'] != "all") {
		
		$query = "SELECT * FROM `lecturer` WHERE lecturer_id = '".$_POST['lName']."' order by lecturer_id";
		$result = mysql_query($query) or die(mysql_error());$num_row = mysql_num_rows($result);
		if ($num_row >=1){echo "<table style='border:1px solid #666;padding:5px;background:#fff'><tr><th style='border:1px solid #666;padding:5px;background:#aaa'>#</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Lecturer</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Email</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Category</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Eligibility</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Working Experience</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Country</th></tr>";while($row = mysql_fetch_array($result)){$user = new User();$getsubject = $user->getSubjectName($row['industry_category']);$geteligibility = $user->getEligibleName($row['education_level']);echo "<tr>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['lecturer_id']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['fname'].' '.$row['lname']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['email']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$getsubject->name."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$geteligibility->name."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['working_exp']." years @ ".$row['company_name']." as a ".$row['company_designation']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['a_country']."</td>";echo "</tr>";}echo "</table>";}else{echo "No Data.";}
	}
	else{

		$query = "SELECT * FROM `lecturer` order by lecturer_id";		
		$result = mysql_query($query) or die(mysql_error());$num_row = mysql_num_rows($result);
		if ($num_row >=1){echo "<table style='border:1px solid #666;padding:5px;background:#fff'><tr><th style='border:1px solid #666;padding:5px;background:#aaa'>#</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Lecturer</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Email</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Category</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Eligibility</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Working Experience</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Country</th></tr>";while($row = mysql_fetch_array($result)){$user = new User();$getsubject = $user->getSubjectName($row['industry_category']);$geteligibility = $user->getEligibleName($row['education_level']);echo "<tr>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['lecturer_id']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['fname'].' '.$row['lname']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['email']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$getsubject->name."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$geteligibility->name."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['working_exp']." years @ ".$row['company_name']." as a ".$row['company_designation']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['a_country']."</td>";echo "</tr>";}echo "</table>";}else{echo "No Data.";}
	}	
}

//############# All Lecturers & Subject Filter Details Start Here...
if (!empty($_POST['lName']) && !empty($_POST['lSubject']) && empty($_POST['lEligibility'])) {

	if ($_POST['lName'] == "all") {
		
		$query = "SELECT * FROM `lecturer` WHERE industry_category = '".$_POST['lSubject']."' order by lecturer_id";
		$result = mysql_query($query) or die(mysql_error());$num_row = mysql_num_rows($result);
		if ($num_row >=1){echo "<table style='border:1px solid #666;padding:5px;background:#fff'><tr><th style='border:1px solid #666;padding:5px;background:#aaa'>#</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Lecturer</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Email</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Category</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Eligibility</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Working Experience</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Country</th></tr>";while($row = mysql_fetch_array($result)){$user = new User();$getsubject = $user->getSubjectName($row['industry_category']);$geteligibility = $user->getEligibleName($row['education_level']);echo "<tr>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['lecturer_id']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['fname'].' '.$row['lname']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['email']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$getsubject->name."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$geteligibility->name."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['working_exp']." years @ ".$row['company_name']." as a ".$row['company_designation']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['a_country']."</td>";echo "</tr>";}echo "</table>";}else{echo "No Data.";}
	}	
}

//############# All Lecturers & Eligibility Filter Details Start Here...
if (!empty($_POST['lName']) && empty($_POST['lSubject']) && !empty($_POST['lEligibility'])) {

	if ($_POST['lName'] == "all") {
		
		$query = "SELECT * FROM `lecturer` WHERE education_level = '".$_POST['lEligibility']."' order by lecturer_id";
		$result = mysql_query($query) or die(mysql_error());$num_row = mysql_num_rows($result);
		if ($num_row >=1){echo "<table style='border:1px solid #666;padding:5px;background:#fff'><tr><th style='border:1px solid #666;padding:5px;background:#aaa'>#</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Lecturer</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Email</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Category</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Eligibility</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Working Experience</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Country</th></tr>";while($row = mysql_fetch_array($result)){$user = new User();$getsubject = $user->getSubjectName($row['industry_category']);$geteligibility = $user->getEligibleName($row['education_level']);echo "<tr>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['lecturer_id']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['fname'].' '.$row['lname']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['email']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$getsubject->name."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$geteligibility->name."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['working_exp']." years @ ".$row['company_name']." as a ".$row['company_designation']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['a_country']."</td>";echo "</tr>";}echo "</table>";}else{echo "No Data.";}
	}	
}

//############# All Lecturers & Subject & Eligibility Filter Details Start Here...
if (!empty($_POST['lName']) && !empty($_POST['lSubject']) && !empty($_POST['lEligibility'])) {

	if ($_POST['lName'] == "all") {
		
		$query = "SELECT * FROM `lecturer` WHERE industry_category = '".$_POST['lSubject']."' and education_level = '".$_POST['lEligibility']."' order by lecturer_id";
		$result = mysql_query($query) or die(mysql_error());$num_row = mysql_num_rows($result);
		if ($num_row >=1){echo "<table style='border:1px solid #666;padding:5px;background:#fff'><tr><th style='border:1px solid #666;padding:5px;background:#aaa'>#</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Lecturer</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Email</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Category</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Eligibility</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Working Experience</th><th style='border:1px solid #666;padding:5px;background:#aaa'>Country</th></tr>";while($row = mysql_fetch_array($result)){$user = new User();$getsubject = $user->getSubjectName($row['industry_category']);$geteligibility = $user->getEligibleName($row['education_level']);echo "<tr>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['lecturer_id']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['fname'].' '.$row['lname']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['email']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$getsubject->name."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$geteligibility->name."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['working_exp']." years @ ".$row['company_name']." as a ".$row['company_designation']."</td>";echo "<td style='border:1px solid #666;padding:5px;background:#fff'>".$row['a_country']."</td>";echo "</tr>";}echo "</table>";}else{echo "No Data.";}
	}	
}

?>
