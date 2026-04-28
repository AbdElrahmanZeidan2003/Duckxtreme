<?php
include "db.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM Customer WHERE Email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['Password'])) {
        $_SESSION['user_id'] = $user['Customer_id'];
        echo "Login successful!";
    } else {
        echo "Wrong password";
    }
} else {
    echo "User not found";
}
?>