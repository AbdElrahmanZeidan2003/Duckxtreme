<?php
include "db_connect.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM customer WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['customer_id'] = $user['customer_id'];
        $_SESSION['user'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        
        header("Location: shop.html");
        exit();
    } else {
        echo "Wrong password";
    }
} else {
    echo "User not found";
}
?>