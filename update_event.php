<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the event ID is provided and not empty
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $eventId = $_POST['id'];
        $updatedAttendees = $_POST['attendees'];
        $updatedEventName = $_POST['event_name'];
        $updatedEventDate = $_POST['event_date'];

        // Prepare and bind parameters for the SQL statement
        $sql = "UPDATE event SET attendees = ?, event_name = ?, event_date = ? WHERE id = ?";

        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('sssi', $updatedAttendees, $updatedEventName, $updatedEventDate, $eventId);
            if ($stmt->execute()) {
                echo "Event updated successfully!";
                echo '<p><a href="admin_dashboard.php">Back to Admin Dashboard</a></p>';
            } else {
                echo "Error updating event: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Event ID not provided or invalid.";
    }
} else {
    echo "Invalid request.";
}
?>