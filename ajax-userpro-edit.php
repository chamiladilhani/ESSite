<?php

include_once 'classes/db.class.php';
include_once 'classes/function.class.php';
include_once 'classes/user.class.php';

$user = new User();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'es-db');
$connection = @mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$email=mysql_real_escape_string($_POST['email']); 
$uid=$_POST['uid'];
$password=mysql_real_escape_string($_POST['password']);
$role="Deleget"; 

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

if(preg_match($regex, $email))
{  
    $password=md5($password); // Encrypted password

    $count=mysqli_query($connection,"SELECT lecturer_id FROM `lecturer` WHERE email='$email'");

    if(mysqli_num_rows($count) > 0){
        echo 'The email is already taken, please try new.';
    }
    else{

        $count=mysqli_query($connection,"SELECT deleget_id FROM `deleget` WHERE email='$email'");

        if(mysqli_num_rows($count) > 0){
            echo 'The email is already taken, please try new.';
        }
        else{
            $count=mysqli_query($connection,"SELECT user_id FROM `user` WHERE email='$email' and user_id!='$uid'");
            

            if(mysqli_num_rows($count) > 0){
                echo 'The email is already taken, please try new.';
            }
            else{

                $data = array(

                    'email'     => $_POST['email'],
                    'fname'     => $_POST['fname'],
                    'lname'     => $_POST['lname'],
                    'password'  => $_POST['password'],
                );
                $user->edit($uid,$data);
           
                echo 'Successful';
            }
        }
    }
}

?>
