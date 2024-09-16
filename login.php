<?php
session_start(); // Start session

include 'config.php'; // Include database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];
    $loginType = $_POST["login_type"]; // Get the login type from the hidden input

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($password == $row["password"]) {
            if ($loginType == "admin" && $row["is_admin"] == 1) {
                $_SESSION["email"] = $row["email"];
                header("Location: admin_dashboard.php");
                exit();
            } elseif ($loginType == "user" && $row["is_admin"] == 0) {
                $_SESSION["email"] = $row["email"];
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid login type!";
            }
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "Email not found!";
    }
}
?>
