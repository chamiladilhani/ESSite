<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from       = "from@gmail.com";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
$mail->Port       =  465;                    // set the SMTP port
$mail->Username   = "testdatacore@gmail.com";  // SMTP  username
$mail->Password   = "Dtech2020";  // SMTP password
$mail->SetFrom($from, 'ES-site');
$mail->AddReplyTo($from,'ES-site');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send();   
}
?>
