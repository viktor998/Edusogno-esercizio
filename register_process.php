<?php
include 'config.php'; // Include database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
    $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $isAdmin = isset($_POST['isAdmin']) ? 1 : 0; // Check if admin checkbox is checked

    // Insert user data into the database using prepared statements
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, is_admin) 
                            VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $firstName, $lastName, $email, $password, $isAdmin);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
