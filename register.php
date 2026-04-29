<?php
include "db_connect.php";

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO Customer (Name, Email, Password)
        VALUES ('$fullname', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registered successfully!";
} else {
    echo "Error: " . $conn->error;
}
?>