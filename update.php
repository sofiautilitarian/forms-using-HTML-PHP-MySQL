<?php

$id = $_GET['id']; // ID of the record to retrieve

$conn = new mysqli('localhost', 'root', '', 'personal_info');

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    // Prepare the SQL statement with a placeholder
    $stmt = $conn->prepare("SELECT * FROM registration WHERE id = ?");
    $stmt->bind_param("i", $id); // Bind the ID as an integer

    // Execute the statement
    $stmt->execute();

    $result = $stmt->get_result(); // Get the result set

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Get the first row as an associative array
        echo "ID: " . $row['id'] . "<br>";
        echo "Full Name: " . $row['fullname'] . "<br>";
        echo "Email Address: " . $row['emailaddress'] . "<br>";
        // ... (display other retrieved data)
    } else {
        echo "No record found with the provided ID";
    }

    $stmt->close();
    $conn->close();
}

?>