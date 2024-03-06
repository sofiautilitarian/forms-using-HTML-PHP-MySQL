<?php
$fullname = $_POST['fullname'];
$emailaddress = $_POST['emailaddress'];
$phonenumber = $_POST['phonenumber'];
$birthdate = $_POST["birthdate"];
$gender = $_POST['gender'];
$address = $_POST["address"];
$country = $_POST['country'];
$city = $_POST['city'];
$region = $_POST['region'];
$postalcode = $_POST['postalcode'];


$conn = new mysqli('localhost', 'root', '', 'personal_info');

$id = $_GET['phonenumber']; 

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    
    $stmt = $conn->prepare("DELETE FROM registration WHERE phonenumber = ?");
    $stmt->bind_param("s", $phonenumber);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Record deleted successfully";
    } else {
        echo "No record found with the provided ID";
    }

    $stmt->close();
    $conn->close();
}


?>