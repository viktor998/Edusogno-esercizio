<!-- event_details.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
</head>
<body>
    <h1>Event Details</h1>
    <?php
    include 'config.php'; // Include the config file

    // Fetch event details based on ID from URL parameter
    $eventId = $_GET['id']; // Assuming you pass the event ID in the URL

    $sql = "SELECT * FROM events WHERE id = $eventId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p>Name: " . $row['event_name'] . "</p>";
        echo "<p>Date: " . $row['event_date'] . "</p>";
        echo "<p>Description: " . $row['event_description'] . "</p>";
        // Add more event details as needed
    } else {
        echo "Event not found";
    }

    $conn->close(); // Close the database connection
    ?>
</body>
</html>
