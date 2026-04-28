<?php
session_start();
include 'db_connect.php';

// make sure user is logged in
if (!isset($_SESSION['customer_id'])) {
    die("You must be logged in");
}

$customer_id = $_SESSION['customer_id'];
$product_id = $_POST['product_id'];

// 1. Get or create cart
$sql = "SELECT cart_id FROM Cart WHERE customer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cart_id = $row['cart_id'];
} else {
    $sql = "INSERT INTO Cart (customer_id) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $cart_id = $conn->insert_id;
}

// 2. Check if item already in cart
$sql = "SELECT * FROM CartItem WHERE cart_id = ? AND product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $cart_id, $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // update quantity
    $sql = "UPDATE CartItem SET quantity = quantity + 1 WHERE cart_id = ? AND product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cart_id, $product_id);
    $stmt->execute();
} else {
    // insert new item
    $sql = "INSERT INTO CartItem (cart_id, product_id, quantity) VALUES (?, ?, 1)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cart_id, $product_id);
    $stmt->execute();
}

header("Location: cart.php");
exit();
?>