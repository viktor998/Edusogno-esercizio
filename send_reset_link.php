<?php
require 'PHPMailer/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer/PHPMailer-master/src/SMTP.php';
require 'PHPMailer/PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'config.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Generate a unique password reset token
    $token = bin2hex(random_bytes(16));

    // Store the token in the database along with the user's email
    $update_sql = "UPDATE users SET reset_token='$token' WHERE email='$email'";
    $update_result = $conn->query($update_sql);

    if ($update_result === TRUE) {
        // Create a PHPMailer object
        $mail = new PHPMailer();

        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'wefagikaba@gmail.com'; // Your Gmail email address
        $mail->Password = 'ohlf nhqp xoph psyt'; // Your app password or account password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587;  // Port for TLS

        // Email Content
        $mail->setFrom('wefagikaba@gmail.com', 'Franz-James'); // Sender's email and name
        $mail->addAddress($email); // Recipient's email
        $mail->Subject = 'Reset Your Password';
        $reset_link = "http://localhost:4000/reset_password.php?token=$token";
        $mail->Body = "Click the following link to reset your password:\n$reset_link";

        // Send Email
        try {
            if ($mail->send()) {
                header("Location: reset_link_sent.php"); // Redirect on success
            } else {
                header("Location: forgot_password.php?error=email_not_sent");
            }
        } catch (Exception $e) {
            header("Location: forgot_password.php?error=email_send_error");
        }
    } else {
        header("Location: forgot_password.php?error=token_generation_failed");
    }
}
?>
