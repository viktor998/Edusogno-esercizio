<?php
require 'PHPMailer\PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer\PHPMailer-master\src\SMTP.php';
require 'PHPMailer\PHPMailer-master\src\Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$token = bin2hex(random_bytes(16));
// Create a PHPMailer object
$mail = new PHPMailer();

// SMTP Configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'wefagikaba@gmail.com'; // Your Gmail email address
$mail->Password = 'ohlf nhqp xoph psyt'; // Your app password (if using 2-Step Verification) or account password
$mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to

// Email Content
$mail->setFrom('wefagikaba@gmail.com', 'Franz-James'); // Sender's email and name
$mail->addAddress('6geh3mbhqt@rfcdrive.com', 'test'); // Recipient's email and name
$mail->Subject = 'Test Email';
$reset_link = "http://localhost:4000/reset_password.php?token=$token";
$mail->Body = "Click the following link to reset your password:\n$reset_link";

// Send Email
if ($mail->send()) {
    echo 'Email sent successfully';
} else {
    echo 'Email sending failed: ' . $mail->ErrorInfo;
}
?>
