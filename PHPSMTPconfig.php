<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



// To SMTP configuration
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host     = 'bod1.bodhosting.com';
$mail->SMTPAuth = true;
$mail->Username = 'info@htmlbasket.com';
//$mail->Password = 'htmlbasket@786';
$mail->Password = 'htmlbasket@786';
$mail->SMTPSecure = 'ssl';
$mail->Port     = 465;

// From SMTP configuration
$Replaymail = new PHPMailer;
$Replaymail->isSMTP();
$Replaymail->Host     = 'bod1.bodhosting.com';
$Replaymail->SMTPAuth = true;
$Replaymail->Username = 'info@htmlbasket.com';
$Replaymail->Password = 'htmlbasket@786';
$Replaymail->SMTPSecure = 'ssl';
$Replaymail->Port     = 465;
?>