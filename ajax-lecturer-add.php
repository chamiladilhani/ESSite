<?php

include_once 'classes/db.class.php';
include_once 'classes/function.class.php';
include_once 'classes/lecturer.class.php';

$lecturer = new Lecturer();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'es-db');
$connection = @mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$base_url='http://localhost/ES-site/';

$email=mysql_real_escape_string($_POST['email']); 
$password=mysql_real_escape_string($_POST['password']);
$role="Lecturer"; 

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

if(preg_match($regex, $email))
{  
    $password=md5($password); // Encrypted password
    $activation=md5($email.time()); // Encrypted email+timestamp

    $count=mysqli_query($connection,"SELECT lecturer_id FROM `lecturer` WHERE email='$email'");
    if(mysqli_num_rows($count) < 1)
    {

        $data = array(
                'fname'                 => $_POST['fname'],
                'lname'                 => $_POST['lname'],
                'email'                 => $email,
                'password'              => $password,                
                'role'                  => $role,
                'activation'            => $activation,
                'contact'               => $_POST['contact'],
                'a_no'                  => $_POST['a_no'],
                'a_street'              => $_POST['a_street'],
                'a_city'                => $_POST['a_city'],
                'a_country'             => $_POST['a_country'],
                'industry_category'     => $_POST['industry_category'],
                'education_level'       => $_POST['education_level'],
                'working_exp'           => $_POST['working_exp'],
                'company_name'          => $_POST['company_name'],
                'company_designation'   => $_POST['company_designation'],
                'summary'               => $_POST['summary'],
                'experience'            => $_POST['experience'],
                'skills'                => $_POST['skills'],
                'membership'            => $_POST['membership'],

                );
        $lecturer->add($data);

        //include 'smtp/Send_Mail.php';
        /*$headers = 'From: masswebster@gmail.com' . "\r\n" .
                   'Reply-To: masswebster@gmail.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $to=$email;
        $subject="ES-Site email verification";            
        $message = 'Hi,<br/><br/>';
        $message .= 'We need to make sure you are human.<br/><br/>';
        $message .= 'Please verify your email and get started using your account. <br/> <br/>';
        $message .= '<a href="'.$base_url.'activation.php?code='.$activation.'">'.$base_url.'activation.php?code='.$activation.'</a><br/><br/>';
        $message .= 'ES-Site Team';
        mail($to,$subject,$message,$headers);*/
   
        echo 'Successful';

    }
    else
    {
        echo 'The email is already taken, please try new.';
    }
}

?>
