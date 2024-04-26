<?php
session_start();
include('config.php');

// Check if user is logged in
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $attendees = $_POST["attendees"];
    $nome_evento = $_POST["nome_evento"];
    $data_evento = $_POST["data_evento"];

    $sql = "INSERT INTO events (attendees, nome_evento, data_evento) 
            VALUES ('$attendees', '$nome_evento', '$data_evento')";

    if ($conn->query($sql) === TRUE) {
        echo "Event created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
</head>
<body>
    <h1>Create Event</h1>
    <form action="create_event.php" method="post">
        <label for="attendees">Attendees (comma-separated emails):</label>
        <input type="text" id="attendees" name="attendees" required><br>
        <label for="nome_evento">Event Name:</label>
        <input type="text" id="nome_evento" name="nome_evento" required><br>
        <label for="data_evento">Event Date:</label>
        <input type="datetime-local" id="data_evento" name="data_evento" required><br>
        <button type="submit">Create Event</button>
    </form>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
