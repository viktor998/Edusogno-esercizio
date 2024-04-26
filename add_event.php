<?php
include('config.php');

// Check if 'attendees', 'event_name', and 'event_date' are provided
if (isset($_POST['attendees']) && isset($_POST['event_name']) && isset($_POST['event_date'])) {
    $attendees = $_POST['attendees'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];

    // Prepare and bind parameters for the SQL statement
    $stmt = $conn->prepare("INSERT INTO event (attendees, event_name, event_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $attendees, $event_name, $event_date);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo "Event added successfully!";
        header("Location: admin_dashboard.php");
    } else {
        echo "Error adding event: " . $stmt->error;
    }
} else {
    echo "Incomplete data provided.";
}
?>
