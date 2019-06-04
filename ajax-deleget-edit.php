<?php

include_once 'classes/db.class.php';
include_once 'classes/function.class.php';
include_once 'classes/deleget.class.php';

$deleget = new Deleget();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'es-db');
$connection = @mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$email=mysql_real_escape_string($_POST['email']); 
$did=$_POST['did'];
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

        $count=mysqli_query($connection,"SELECT user_id FROM `user` WHERE email='$email'");

        if(mysqli_num_rows($count) > 0){
            echo 'The email is already taken, please try new.';
        }
        else{
            
            $count=mysqli_query($connection,"SELECT deleget_id FROM `deleget` WHERE email='$email' and deleget_id!='$did'");

            if(mysqli_num_rows($count) > 0){
                echo 'The email is already taken, please try new.';
            }
            else{

                $data = array(
                        'fname'                     => $_POST['fname'],
                        'lname'                     => $_POST['lname'],
                        'email'                     => $email,
                        'password'                  => $password,                
                        'role'                      => $role,
                        //'activation'                => $activation,
                        'contact'                   => $_POST['contact'],
                        'industry_category'         => $_POST['industry_category'],
                        'education_level'           => $_POST['education_level'],
                        'working_exp'               => $_POST['working_exp'],
                        'professionally_qualified'  => $_POST['professionally_qualified'],
                        'dqualifications'           => $_POST['dqualifications'],

                        );
                $deleget->edit($did,$data);
           
                echo 'Successful';
            }
        }
    }
}

?>
