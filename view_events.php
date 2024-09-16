<?php
session_start();
include('config.php');

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Fetch all events
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Display events
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events</title>
</head>
<body>
    <h1>View Events</h1>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>{$row['event_name']} - {$row['event_date']} [<a href='edit_event.php?id={$row['id']}'>Edit</a>] [<a href='delete_event.php?id={$row['id']}'>Delete</a>]</li>";
            }
        } else {
            echo "<li>No events found.</li>";
        }
        ?>
    </ul>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
