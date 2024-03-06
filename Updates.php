<?php


$fullname = $_POST['fullname'];
$emailaddress = $_POST['emailaddress'];
$phonenumber = $_POST['phonenumber'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$country = $_POST['country'];
$city = $_POST['city'];
$region = $_POST['region'];
$postalcode = $_POST['postalcode'];

$conn = new mysqli('localhost', 'root', '', 'personal_info');

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("UPDATE registration SET emailaddress = ? WHERE phonenumber = ?");
    $stmt->bind_param("ss", $emailaddress, $phonenumber); // Bind data and ID

    // Execute the statement
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Record updated successfully";
    } else {
        echo "No record found with the provided ID";
    }

    $stmt->close();
    $conn->close();
}

?>
