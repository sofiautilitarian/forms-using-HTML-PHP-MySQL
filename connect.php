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

if($conn->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}

else{
    $stmt = $conn->prepare("insert into registration(fullname, emailaddress, phonenumber, birthdate, gender, address, country, city, region, postalcode)
    values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $fullname, $emailaddress, $phonenumber, $birthdate, $gender, $address, $country, $city, $region, $postalcode);
    $stmt->execute();
    echo "registration successful";
    $stmt->close();
    $conn->close();
}


?>