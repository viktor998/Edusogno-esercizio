<?php
include 'config.php'; // Include database connection

if (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    header("Location: forgot_password.php?error=invalid_token");
    exit(); // Stop further execution
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];

    // Update the user's password in the database
    $update_sql = "UPDATE users SET password='$new_password', reset_token=NULL WHERE reset_token='$token'";
    $update_result = $conn->query($update_sql);

    if ($update_result === TRUE) {
        header("Location: password_reset_success.html"); // Redirect to a page indicating password reset success
    } else {
        header("Location: reset_password.php?error=reset_failed");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <form action="" method="post">
        <input type="password" name="new_password" placeholder="Enter New Password" required>
        <button type="submit">Save Password</button>
    </form>
</body>
</html>
