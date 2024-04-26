<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
</head>
<body>
    <h1>Edit Event</h1>
    <form action="update_event.php" method="post">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>"> <!-- Event ID -->
        <label for="event_name">Event Name:</label>
        <input type="text" id="event_name" name="event_name" value="<?php echo isset($eventDetails['event_name']) ? $eventDetails['event_name'] : ''; ?>"><br>
        <label for="attendees">Attendees:</label>
        <input type="text" id="attendees" name="attendees" value="<?php echo isset($eventDetails['attendees']) ? $eventDetails['attendees'] : ''; ?>"><br>
        <label for="event_date">Event Date:</label>
        <input type="datetime-local" id="event_date" name="event_date" value="<?php echo isset($eventDetails['event_date']) ? $eventDetails['event_date'] : ''; ?>"><br>
        <button type="submit">Save Changes</button>
    </form>

    <!-- Link to Admin Dashboard -->
    <p><a href="admin_dashboard.php">Back to Admin Dashboard</a></p>
</body>
</html>

<?php
include('config.php');

// Check if the event ID is set in the URL
if (isset($_GET['id'])) {
    $eventId = $_GET['id']; // Event ID from URL
} else {
    // Redirect back to the Admin Dashboard if the event ID is not provided
    header("Location: admin_dashboard.php");
    exit;
}
?>