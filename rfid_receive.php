<?php
include('db_connection.php');

// Check if RFID data is received
if (isset($_POST['rfid'])) {
    $rfid = $_POST['rfid'];

    // Query to check if the RFID tag exists
    $query = "SELECT * FROM users WHERE rfid_tag = '$rfid'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // RFID matched, proceed with facial recognition check
        echo "RFID Matched. Proceeding to face recognition.";
        // Call the facial recognition process here
    } else {
        echo "Invalid RFID.";
    }
} else {
    echo "No RFID data received.";
}
?>
