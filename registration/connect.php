<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$phonenumber = $_POST['phonenumber'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'registration_db');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(firstName, lastName, email, password, phonenumber) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $firstName, $lastName, $email, $password, $phonenumber);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successful...";
    $stmt->close();
    $conn->close();
}
