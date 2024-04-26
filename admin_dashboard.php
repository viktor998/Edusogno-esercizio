<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'config.php'; // Include database connection
include_once 'event_controller.php';

// Initialize EventController
$eventController = new EventController($conn);

// Check if the form for adding an event was submitted
if (isset($_POST['add_event'])) {
    $attendees = $_POST['attendees'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];

    // Add the event using the EventController
    if ($eventController->addEvent($attendees, $event_name, $event_date)) {
        echo "Event added successfully.";
    } else {
        echo "Error adding event.";
    }
}

// Fetch all events from the database
$events = $eventController->getAllEvents();

// Display events in a table
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <form method="post" action="add_event.php"> <!-- Updated form action -->
        <label for="attendees">Attendees:</label>
        <input type="text" id="attendees" name="attendees" required><br>
        <label for="event_name">Event Name:</label>
        <input type="text" id="event_name" name="event_name" required><br>
        <label for="event_date">Event Date:</label>
        <input type="datetime-local" id="event_date" name="event_date" required><br>
        <button type="submit" name="add_event">Add Event</button>
    </form>

    <h2>All Events</h2>
    <table border="1">
        <tr>
            <th>Attendees</th>
            <th>Event Name</th>
            <th>Event Date</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($events as $event) { ?>
            <tr>
                <td><?php echo $event->getAttendees(); ?></td>
                <td><?php echo $event->getEventName(); ?></td> 
                <td><?php echo $event->getEventDate(); ?></td>
                <td>
                    <!-- Edit Button -->
                    <form action="edit_event.php?id=<?php echo $event->getId(); ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $event->getId(); ?>">
                        <button type="submit" name="edit_event">Edit</button>
                    </form>

                    <!-- Delete Button -->
                    <form action="delete_event.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $event->getId(); ?>">
                        <button type="submit" name="delete_event">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
