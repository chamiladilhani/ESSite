<?php  include('header_includes.php'); 

$usr = new User();

if(isset($_REQUEST['mid'])){
	if ($_SESSION['role'] == 'Administrator' || $_SESSION['role'] == 'Organizer' || $_SESSION['role'] == 'Support') {
		$role = new User();
		$details = $role->getUserDetails();
	}
	elseif ($_SESSION['role'] == 'Lecturer') {
		$role = new Lecturer();
		$details = $role->getLecturerDetails();
	}
	else{
		$role = new Deleget();
		$details = $role->getDelegetDetails();
	}
}

?>

<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title></title>
	
	<meta name="keywords" content="responsive, grid, system, web design">

	<meta http-equiv="cleartype" content="on">

	<link rel="shortcut icon" href="/favicon.ico">

	<!-- Responsive and mobile friendly stuff -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<style type="text/css">
		.errorShow{
			background:red;border-radius:500px;color:#FFFFFF;display:inline;float:left;font-size:11px;margin-bottom:-5px;padding:1px 5px 0;position: relative;top:-7px;
		}
		h3 {
		    color: #888888 !important;
		    font-size: 14px !important;
		    font-weight: normal;
		    text-transform: uppercase;
		}
	</style>

	<?php include('header.php'); ?>

</head>

<body>

<div id="wrapper">

	<div id="headcontainer">
		<?php include('top.php'); ?>
	</div>

	<div id="maincontentcontainer" class="">
		<div id="maincontent">

			<div class="breadcrumb">
            	<a href="index.php">Home</a> &raquo; Profile manage
            </div>

			<div class="section group">
			<h1>Manage Profile</h1>
                <div class="">
                	<?php if(isset($_REQUEST['mid'])){ if ($_SESSION['role'] == 'Lecturer') { ?>
                	<form id="lectureraddForm" method="post" action="">

                       	<label for="">Full name <i>*</i></label>
                        <div class="section group">
                        	<div class="col span_2_of_4">
                        		<input type="text" id="fname" name="fname" value="<?php echo $details->fname ?>" placeholder="Please enter your first name">
                        		<span class="errorLectureradd errorShow" id="lecturerAdd-fname"></span>
                        	</div>
                        	<div class="col span_2_of_4">
                        		<input type="text" id="lname" name="lname" value="<?php echo $details->lname ?>" placeholder="Please enter your last name">
                        		<span class="errorLectureradd errorShow" id="lecturerAdd-lname"></span>
                        	</div>
                        </div>
                        
                        <label for="">Email address <i>*</i></label>  
                        <div class="section group">
                        	<div class="col span_2_of_4">
                        		<input type="email" id="email" name="email" value="<?php echo $details->email ?>" placeholder="Please enter your email">
                        		<span class="errorLectureradd errorShow" id="lecturerAdd-email"></span>
                        	</div>
                        	<div class="col span_2_of_4">
                        		<input type="email" id="cemail" name="cemail" placeholder="Please confirm email">
                        		<span class="errorLectureradd errorShow" id="lecturerAdd-cemail"></span>
                        	</div>
                        </div>

                        <label for="">Password <i>*</i></label> 
                        <div class="section group">
                        	<div class="col span_2_of_4">
                        		<input type="password" id="password" name="password" placeholder="Please enter your password">
                        		<span class="errorLectureradd errorShow" id="lecturerAdd-password"></span>
                        	</div>
                        	<div class="col span_2_of_4">
                        		<input type="password" id="cpassword" name="cpassword" placeholder="Please confirm password">
                        		<span class="errorLectureradd errorShow" id="lecturerAdd-cpassword"></span>
                        	</div>
                        </div> 

                        <label for="">Contact number <i>*</i></label>
                        <div class="section group"> 			                        
                        	<input type="tel" id="contact" name="contact" value="<?php echo $details->contact ?>" placeholder="Please enter your contact number">
                        	<span class="errorLectureradd errorShow" id="lecturerAdd-contact"></span>
                        </div>	

                        <label for="">Resident </label>  
                        <div class="section group">
                        	<div class="col span_1_of_4">
                        		<input type="text" id="a_no" name="a_no" value="<?php echo $details->a_no ?>" placeholder="#20/14">
                        		<span class="errorLectureradd errorShow" id="lecturerAdd-a_no"></span>
                        	</div>
                        	<div class="col span_1_of_4">
                        		<input type="text" id="a_street" name="a_street" value="<?php echo $details->a_street ?>" placeholder="Street">
                        		<span class="errorLectureradd errorShow" id="lecturerAdd-a_street"></span>
                        	</div>
                        	<div class="col span_1_of_4">
                        		<input type="text" id="a_city" name="a_city" value="<?php echo $details->a_city ?>" placeholder="City">
                        		<span class="errorLectureradd errorShow" id="lecturerAdd-a_city"></span>
                        	</div>
                        	<div class="col span_1_of_4">
                        		<input type="text" id="a_country" name="a_country" value="<?php echo $details->a_country ?>" placeholder="Country">
                        		<span class="errorLectureradd errorShow" id="lecturerAdd-a_country"></span>
                        	</div>
                        </div>

                        <label for="">Industry Category <i>*</i></label>
                        <div class="section group">
                        	<select id="industry_category" name="industry_category">
	                        	<option value="0">Select</option>
	                        	<?php 
	                        		$role = new User();
	                        		echo array2dropdown($role->getSubjectDropDown(),$details->industry_category);
	                        	?>
	                        </select>
	                        <span class="errorLectureradd errorShow" id="lecturerAdd-industry_category"></span>
                        </div>	

                        <label for="">Education level <i>*</i></label>
                        <div class="section group">  
	                        <select id="education_level" name="education_level">
	                        	<option value="0">Select</option>
								<?php 
	                        		$role = new User();
	                        		echo array2dropdown($role->getEligibilityDropDownToLecturer(),$details->education_level);
	                        	?>
	                        </select>
	                        <span class="errorLectureradd errorShow" id="lecturerAdd-education_level"></span>
	                    </div>	  

	                    <label for="">Working Experience <i>*</i></label>
                        <div class="section group">
                        	<div class="col span_1_of_1">
                        		<input type="number" id="working_exp" name="working_exp" value="<?php echo $details->working_exp ?>" placeholder=""><small> years</small>			                        		 
                        		<span style="float:right !important;left: 2px;top: 2px;" class="errorLectureradd errorShow" id="lecturerAdd-working_exp"></span>
                        	</div>			                        	
                        </div>	

                        <label for="">Company <i>*</i></label> 
                        <div class="section group">
                        	<div class="col span_2_of_4">
                        		<input type="text" id="company_name" name="company_name" value="<?php echo $details->company_name ?>" placeholder="Company Name">
                        		<span class="errorLectureradd errorShow" id="lecturerAdd-company_name"></span>
                        	</div>
                        	<div class="col span_2_of_4">
                        		<input type="text" id="company_designation" name="company_designation" value="<?php echo $details->company_designation ?>" placeholder="Designation">
                        		<span class="errorLectureradd errorShow" id="lecturerAdd-company_designation"></span>
                        	</div>
                        </div>  

                        <label for="">Your Summary </label>  
                    	<div class="section group">
                    		<textarea style="height:auto;" rows="6" id="summary" name="summary" placeholder="Please enter your summary"><?php echo $details->summary ?></textarea>
                    		<span class="errorLectureradd errorShow" id="lecturerAdd-summary"></span>
                    	</div>

                        <label for="">Your Experience </label> 
                        <div class="section group">
                        	<textarea style="height:auto;margin-bottom:0" id="experience" name="experience" placeholder="Please enter your experience" rows="6"><?php echo $details->experience ?></textarea>
                        	<small style="font-size:10px;color:#555;">(Use commas to separate experience)</small>
                        </div>   

                        <label for="">Your Skills </label> 
                        <div class="section group">
                        	<textarea style="height:auto;margin-bottom:0" id="skills" name="skills" placeholder="Please enter your skills" rows="6"><?php echo $details->skills ?></textarea>
                        	<small style="font-size:10px;color:#555;">(Use commas to separate skills)</small>
                        </div>                      
                        
                        <label for="">Your Memberships </label> 
                        <div class="section group">
                        	<textarea style="height:auto;margin-bottom:0" id="membership" name="membership" placeholder="Please enter your memberships" rows="6"><?php echo $details->membership ?></textarea>
                        	<small style="font-size:10px;color:#555;">(Use commas to separate memberships details)</small>
                        </div>                     

                        <div style="margin-bottom:10px;" id="lectureradd-ok" class="logged-box alert"></div>	
				<div style="margin-bottom:10px;" id="lectureradd-error" class="error-box alert"></div>	

				<input type="hidden" id="lid" name="lid" value="<?php echo $details->lecturer_id ?>">	 

                        <button type="submit" id="submitLectureradd" class="button-success button-small pure-button">Update</button>

                   	</form>

                   	<?php } elseif($_SESSION['role'] == 'Deleget'){ ?>

                   	<form id="delegetaddForm" method="post" action="">

                        <label for="">Full name <i>*</i></label>
                        <div class="section group">
                        	<div class="col span_2_of_4">
                        		<input type="text" id="dfname" name="fname" value="<?php echo $details->fname ?>" placeholder="Please enter your first name">
                        		<span class="errorDelegetadd errorShow" id="delegetAdd-fname"></span>
                        	</div>
                        	<div class="col span_2_of_4">
                        		<input type="text" id="dlname" name="lname" value="<?php echo $details->lname ?>" placeholder="Please enter your last name">
                        		<span class="errorDelegetadd errorShow" id="delegetAdd-lname"></span>
                        	</div>
                        </div>
                        
                        <label for="">Email address <i>*</i></label>  
                        <div class="section group">
                        	<div class="col span_2_of_4">
                        		<input type="email" id="demail" name="email" value="<?php echo $details->email ?>" placeholder="Please enter your email">
                        		<span class="errorDelegetadd errorShow" id="delegetAdd-email"></span>
                        	</div>
                        	<div class="col span_2_of_4">
                        		<input type="email" id="dcemail" name="cemail" placeholder="Please confirm email">
                        		<span class="errorDelegetadd errorShow" id="delegetAdd-cemail"></span>
                        	</div>
                        </div>

                        <label for="">Password <i>*</i></label> 
                        <div class="section group">
                        	<div class="col span_2_of_4">
                        		<input type="password" id="dpassword" name="password" placeholder="Please enter your password">
                        		<span class="errorDelegetadd errorShow" id="delegetAdd-password"></span>
                        	</div>
                        	<div class="col span_2_of_4">
                        		<input type="password" id="dcpassword" name="cpassword" placeholder="Please confirm password">
                        		<span class="errorDelegetadd errorShow" id="delegetAdd-cpassword"></span>
                        	</div>
                        </div> 

                        <label for="">Contact number <i>*</i></label> 
                        <div class="section group">  
	                        <input type="tel" id="dcontact" name="contact" value="<?php echo $details->contact ?>" placeholder="Please enter your contact number">
	                        <span class="errorDelegetadd errorShow" id="delegetAdd-contact"></span>
	                    </div>    

                        <label for="">Industry Category <i>*</i></label>
                        <div class="section group">   
	                        <select id="dindustry_category" name="industry_category">
	                        	<option value="0">Select</option>
	                        	<?php 
	                        		$role = new User();
	                        		echo array2dropdown($role->getSubjectDropDown(),$details->industry_category);
	                        	?>
	                        </select>
	                        <span class="errorDelegetadd errorShow" id="delegetAdd-industry_category"></span>
	                    </div>

                        <label for="">Education level <i>*</i></label>  
                        <div class="section group"> 
	                        <select id="deducation_level" name="education_level">
	                        	<option value="0">Select</option>
	                        	<?php 
	                        		$role = new User();
	                        		echo array2dropdown($role->getEligibilityDropDown(),$details->education_level);
	                        	?>
	                        </select>
	                        <span class="errorDelegetadd errorShow" id="delegetAdd-education_level"></span>
	                    </div>    

                        <label for="">Professionally Qualified <i>*</i></label>
                        <div class="section group">
                        	<div class="col span_1_of_2" style="margin-right:10px;">
                        		<input type="radio" id="dprofessionally_qualified" name="professionally_qualified" value="YES">
                        		<small> Yes</small>
                        	</div>
                        	<div class="col span_1_of_2">
                        		<input type="radio" id="dprofessionally_qualified" name="professionally_qualified" value="NO">
                        		<small> No</small>
                        	</div>
                        	<span class="errorDelegetadd errorShow" id="delegetAdd-dprofessionally_qualified"></span>
                        </div>
                        
                        <label for="">(If Yes) Professional Qualifications </label> 
                        <div class="section group">
                        	<textarea style="height:auto;margin-bottom:0" id="dqualifications" name="dqualifications" placeholder="Please enter your qualifications" rows="6"><?php echo $details->dqualifications ?></textarea>
                        	<small style="font-size:10px;color:#555;">(Use commas to separate qualifications)</small>
                        </div>

                        <label for="">and Working Experience </label>
                        <div class="section group">
                        	<div class="col span_1_of_1">
                        		 <input type="number" id="dworking_exp" name="working_exp" value="<?php echo $details->working_exp ?>" placeholder=""><small> years</small>
                        		 <span style="float:right !important;left: 2px;top: 2px;" class="errorDelegetadd errorShow" id="delegetAdd-working_exp"></span>
                        	</div>
                        </div>	

                        <div class="section group">
                        	<div class="col span_1_of_2" style="margin-right:10px;">
                        		<input type="checkbox" id="" name="" value="">
                        		<small> send newsletters</small>
                        	</div>
                        </div>	                        
                       
                       	<div style="margin-bottom:10px;" id="delegetadd-ok" class="logged-box alert"></div>	
			      <div style="margin-bottom:10px;" id="delegetadd-error" class="error-box alert"></div>	

				<input type="hidden" id="did" name="did" value="<?php echo $details->deleget_id ?>">	                        

                        <button type="submit" id="submitDelegetadd" class="button-success button-small pure-button">Update</button>

                  </form>

                  <?php } else{ ?>

                  <form id="UseraddForm" method="post" action="">

                        <label for="">Full name <i>*</i></label>
                        <div class="section group">
                              <div class="col span_2_of_4">
                                    <input type="text" id="ufname" name="fname" value="<?php echo $details->fname ?>" placeholder="Please enter your first name">
                                    <span class="errorUseradd errorShow" id="userAdd-fname"></span>
                              </div>
                              <div class="col span_2_of_4">
                                    <input type="text" id="ulname" name="lname" value="<?php echo $details->lname ?>" placeholder="Please enter your last name">
                                    <span class="errorUseradd errorShow" id="userAdd-lname"></span>
                              </div>
                        </div>
                        
                        <label for="">Email address <i>*</i></label>  
                        <div class="section group">
                              <div class="col span_2_of_4">
                                    <input type="email" id="uemail" name="email" value="<?php echo $details->email ?>" placeholder="Please enter your email">
                                    <span class="errorUseradd errorShow" id="userAdd-email"></span>
                              </div>
                              <div class="col span_2_of_4">
                                    <input type="email" id="ucemail" name="cemail" placeholder="Please confirm email">
                                    <span class="errorUseradd errorShow" id="userAdd-cemail"></span>
                              </div>
                        </div>

                        <label for="">Password <i>*</i></label> 
                        <div class="section group">
                              <div class="col span_2_of_4">
                                    <input type="password" id="upassword" name="password" placeholder="Please enter your password">
                                    <span class="errorUseradd errorShow" id="userAdd-password"></span>
                              </div>
                              <div class="col span_2_of_4">
                                    <input type="password" id="ucpassword" name="cpassword" placeholder="Please confirm password">
                                    <span class="errorUseradd errorShow" id="userAdd-cpassword"></span>
                              </div>
                        </div> 

                        <div style="margin-bottom:10px;" id="useradd-ok" class="logged-box alert"></div> 
                        <div style="margin-bottom:10px;" id="useradd-error" class="error-box alert"></div>     

                        <input type="hidden" id="uid" name="uid" value="<?php echo $details->user_id ?>">                              

                        <button type="submit" id="submitUser" class="button-success button-small pure-button">Update</button>

                  </form>

                  <?php }} ?>

                </div>
                <div class="col span_1_of_4"></div>
                
          	</div>

		</div>	

	</div>	
	
	<!-- Footer inserted here -->
	<?php include('footer.php'); ?>

</div>

	<?php include('footer_includes.php'); ?>

	<script src="ajax-js-files/lecturer-edit-validation.js"></script>
      <script src="ajax-js-files/deleget-edit-validation.js"></script>
      <script src="ajax-js-files/userpro-edit-validation.js"></script>

</body>
</html>