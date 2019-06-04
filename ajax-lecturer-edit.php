<?php

include_once 'classes/db.class.php';
include_once 'classes/function.class.php';
include_once 'classes/lecturer.class.php';

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'es-db');
$connection = @mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$email=mysql_real_escape_string($_POST['email']); 
$lid=$_POST['lid'];
$password=mysql_real_escape_string($_POST['password']);
$role="Lecturer"; 

$lecturer = new Lecturer();

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

if(preg_match($regex, $email))
{  
    $password=md5($password); // Encrypted password

    $count=mysqli_query($connection,"SELECT deleget_id FROM `deleget` WHERE email='$email'");

    if(mysqli_num_rows($count) > 0){
        echo 'The email is already taken, please try new.';
    }
    else{

        $count=mysqli_query($connection,"SELECT user_id FROM `user` WHERE email='$email'");

        if(mysqli_num_rows($count) > 0){
            echo 'The email is already taken, please try new.';
        }
        else{

            $count=mysqli_query($connection,"SELECT lecturer_id FROM `lecturer` WHERE email='$email' and lecturer_id!='$lid'");

            if(mysqli_num_rows($count) > 0){
                echo 'The email is already taken, please try new.';
            }
            else{

                $data = array(
                        'fname'                 => $_POST['fname'],
                        'lname'                 => $_POST['lname'],
                        'email'                 => $email,
                        'password'              => $password,                
                        'role'                  => $role,
                       // 'activation'            => $activation,
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
                $lecturer->edit($lid,$data);

                echo 'Successful';
            }
        }
    }
}

?>
