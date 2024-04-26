<?php
// Include the Event class
include_once 'Event.php';

class EventController {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addEvent() {
        // Check if 'attendees' key exists in $_POST
        if (isset($_POST['attendees'])) {
            // Extract properties from $_POST array
            $attendees = $_POST['attendees'];

            // Prepare and bind parameters for the SQL statement
            $stmt = $this->conn->prepare("INSERT INTO event (attendees) VALUES (?)");
            $stmt->bind_param("s", $attendees);

            // Execute the SQL statement
            if ($stmt->execute()) {
                return true; // Event added successfully
            } else {
                return false; // Error adding event
            }
        } else {
            // Handle the case where 'attendees' is not set in $_POST
            echo "Error: Attendees are required.";
            return false;
        }
    }

    public function updateEvent($id, $attendees, $event_name, $event_date) {
        try {
            // Prepare and bind parameters for the SQL statement
            $stmt = $this->conn->prepare("UPDATE event SET attendees=?, event_name=?, event_date=? WHERE id=?");
            $stmt->bind_param("sssi", $attendees, $event_name, $event_date, $id);

            // Execute the SQL statement
            if ($stmt->execute()) {
                return true; // Event updated successfully
            } else {
                return false; // Error updating event
            }
        } catch (Exception $e) {
            echo "Error updating event: " . $e->getMessage();
            return false;
        }
    }

    public function deleteEvent($id) {
        // Prepare and bind parameters for the SQL statement
        $stmt = $this->conn->prepare("DELETE FROM event WHERE id=?");
        $stmt->bind_param("i", $id);

        // Execute the SQL statement
        if ($stmt->execute()) {
            return true; // Event deleted successfully
        } else {
            return false; // Error deleting event
        }
    }

    public function getAllEvents() {
        // Initialize an empty array to store events
        $events = array();
    
        // Fetch all events from the database
        $result = $this->conn->query("SELECT * FROM event");
    
        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Loop through each row and create Event objects
            while ($row = $result->fetch_assoc()) {
                $event = new Event($row['event_name'], $row['attendees'], $row['event_date']);
                $event->setId($row['id']); // Set the ID for the event
                $events[] = $event; // Add event to the array
            }
        }
    
        return $events; // Return the array of events
    }
    
}
?>
