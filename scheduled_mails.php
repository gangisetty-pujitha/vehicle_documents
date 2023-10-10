<?php
ini_set('max_execution_time','0');
// Set the timezone
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
$mail = new PHPMailer();

// Set the SMTP settings
$mail->isSMTP();
date_default_timezone_set('Asia/Kolkata');

// Set the scheduled time (in this example, it's set to 8:00 AM)
$scheduled_time = strtotime('2023:03:27 22:45:00');

// Get the current time
$current_time = strtotime('2023:03:27 21:30:00');


// Calculate the delay time (in seconds) between the current time and the scheduled time
$delay_time = $scheduled_time - $current_time;

// If the delay time is negative, set it to 0
if ($delay_time < 0) {
    $delay_time = 0;
}
// Use the sleep function to delay the execution of the code until the scheduled time
sleep($delay_time);

// Create a new PHPMailer instance
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'lankaanusha2001@gmail.com';
$mail->Password = 'ygkgvoihalenalno';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Set the email content
$mail->setFrom('lankaanusha2001@gmail.com', 'Anusha');
$mail->addAddress('lankaanusha2001@gmail.com', 'Anusha');
$mail->Subject = 'From Government';
$mail->Body =$msg;

// Send the email
if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>