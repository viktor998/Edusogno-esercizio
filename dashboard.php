<?php
// Start session to access user information
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit;
}

// Include database connection
include 'config.php';

// Get email from session
$email = $_SESSION['email'];

// Fetch user details from the database based on email
$user_sql = "SELECT first_name, last_name FROM users WHERE email='$email'";
$user_result = $conn->query($user_sql);

if ($user_result->num_rows == 1) {
    // User found, fetch user data
    $user_data = $user_result->fetch_assoc();
    $first_name = $user_data['first_name'];
    $last_name = $user_data['last_name'];

    // Display user's first name and last name
    echo "<h1>Welcome, $first_name $last_name!</h1>";

    // Fetch events attended by the user
    $events_sql = "SELECT event_name FROM event WHERE FIND_IN_SET('$email', attendees) > 0";
    $events_result = $conn->query($events_sql);

    if ($events_result->num_rows > 0) {
        // Display attended events in bullet points
        echo "<h2>Your Events:</h2>";
        echo "<ul>";
        while ($event_row = $events_result->fetch_assoc()) {
            echo "<li>{$event_row['event_name']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>You are not attending any events.</p>";
    }
} else {
    // User not found
    echo "<p>Error fetching user information.</p>";
}

// Close database connection
$conn->close();
?>
