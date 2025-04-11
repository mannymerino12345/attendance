<?php
include('db_connection.php');

// Check if the data is received via POST
if (isset($_POST['rfid']) && isset($_POST['name']) && isset($_POST['role'])) {
    $rfid = $_POST['rfid'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Check if the RFID tag already exists
    $query = "SELECT * FROM users WHERE rfid_tag = '$rfid'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // RFID tag already exists, return an error
        echo "RFID tag is already registered.";
    } else {
        // Insert the new user data into the database
        $query = "INSERT INTO users (rfid_tag, name, role) VALUES ('$rfid', '$name', '$role')";
        if ($conn->query($query) === TRUE) {
            echo "User registered successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
} else {
    echo "Invalid data!";
}
?>
