<?php
include('config.php');

// Check if event ID is provided
if (!isset($_POST['id'])) {
    echo "Event ID not provided!";
    exit;
}

$id = $_POST['id'];
$sql = "DELETE FROM event WHERE id=$id"; // Changed table name to 'event'

if ($conn->query($sql) === TRUE) {
    echo "Event deleted successfully!";
} else {
    echo "Error deleting event: " . $conn->error;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Event</title>
</head>
<body>
    <h1>Delete Event</h1>
    <p>Are you sure you want to delete this event?</p>
    <form action="delete_event.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
        <button type="submit">Delete Event</button>
    </form>
    <a href="admin_dashboard.php">Dashboard</a>
</body>
</html>
