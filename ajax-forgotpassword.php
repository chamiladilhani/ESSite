<?php
include_once 'classes/db.class.php';
include_once 'classes/function.class.php';
include_once 'classes/deleget.class.php';
include_once 'classes/lecturer.class.php';

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'es-db');
$connection = @mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
//$base_url='http://localhost/ES-site/';

$email=mysql_real_escape_string($_POST['email']); 

//$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

if($email)
{  
    $count=mysqli_query($connection,"SELECT * FROM `deleget` WHERE email='$email'");

    if(mysqli_num_rows($count) < 1){

        $count=mysqli_query($connection,"SELECT * FROM `lecturer` WHERE email='$email'");

        if(mysqli_num_rows($count) < 1){

            $count=mysqli_query($connection,"SELECT * FROM `user` WHERE email='$email'");

            if(mysqli_num_rows($count) < 1){

                echo 'Sorry, you are not register with us.';
            }
            else{

                $acceptablePasswordChars ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_.$@#&0123456789";
                $randomPassword = "";
                for($i = 0; $i < 8; $i++)
                {
                    $randomPassword .= substr($acceptablePasswordChars, rand(0, strlen($acceptablePasswordChars) - 1), 1);  
                }

                $value = md5($randomPassword);

                mysqli_query($connection,"UPDATE `user` SET password = '$value' WHERE email = '$email'");
                
                //include 'smtp/Send_Mail.php';
                $headers = 'From: masswebster@gmail.com' . "\r\n" .
                   'Reply-To: masswebster@gmail.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $to=$email;
                $subject="ES-Site - Forgot password";            
                $message = 'Hi,<br/><br/>';
                $message .= 'Your password = '.$randomPassword.'<br/><br/>';
                $message .= 'ES-Site Team';
                mail($to,$subject,$message,$headers);

                echo 'Successful';
            }
        }
        else{

            $acceptablePasswordChars ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_.$@#&0123456789";
            $randomPassword = "";
            for($i = 0; $i < 8; $i++)
            {
                $randomPassword .= substr($acceptablePasswordChars, rand(0, strlen($acceptablePasswordChars) - 1), 1);  
            }

            $value = md5($randomPassword);

            mysqli_query($connection,"UPDATE `lecturer` SET password = '$value' WHERE email = '$email'");

            //include 'smtp/Send_Mail.php';
            $headers = 'From: masswebster@gmail.com' . "\r\n" .
                       'Reply-To: masswebster@gmail.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $to=$email;
            $subject="ES-Site - Forgot password";            
            $message = 'Hi,<br/><br/>';
            $message .= 'Your password = '.$randomPassword.'<br/><br/>';
            $message .= 'ES-Site Team';
            mail($to,$subject,$message,$headers);
       
            echo 'Successful';
        }
    }
    else{

        $acceptablePasswordChars ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_.$@#&0123456789";
        $randomPassword = "";
        for($i = 0; $i < 8; $i++)
        {
            $randomPassword .= substr($acceptablePasswordChars, rand(0, strlen($acceptablePasswordChars) - 1), 1);  
        }

        $value = md5($randomPassword);

        mysqli_query($connection,"UPDATE `deleget` SET password = '$value' WHERE email = '$email'");

        //include 'smtp/Send_Mail.php';
        $headers = 'From: masswebster@gmail.com' . "\r\n" .
                   'Reply-To: masswebster@gmail.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $to=$email;
        $subject="ES-Site - Forgot password";            
        $message = 'Hi,<br/><br/>';
        $message .= 'Your password = '.$randomPassword.'<br/><br/>';
        $message .= 'ES-Site Team';
        mail($to,$subject,$message,$headers);
   
        echo 'Successful';
    }
}

?>
