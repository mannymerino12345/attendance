<?php
include('db_connection.php');

// Fetch users from database
$query = "SELECT * FROM users";
$result = $conn->query($query);

echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Role</th><th>RFID Tag</th><th>Actions</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['role'] . "</td>";
    echo "<td>" . $row['rfid_tag'] . "</td>";
    echo "<td><a href='edit_user.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_user.php?id=" . $row['id'] . "'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";
?>
