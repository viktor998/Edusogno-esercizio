<?php
class Event {
    private $id;
    private $attendees;
    private $event_name;
    private $event_date;

    public function __construct($event_name, $attendees, $event_date) {
        $this->event_name = $event_name;
        $this->attendees = $attendees;
        $this->event_date = $event_date;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEventName() {
        return $this->event_name;
    }

    public function setEventName($event_name) {
        $this->event_name = $event_name;
    }

    public function getAttendees() {
        return $this->attendees;
    }

    public function setAttendees($attendees) {
        $this->attendees = $attendees;
    }

    public function getEventDate() {
        return $this->event_date;
    }

    public function setEventDate($event_date) {
        $this->event_date = $event_date;
    }
}

?>
