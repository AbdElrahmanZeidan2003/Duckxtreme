<?php
include 'db_connect.php';

$cart_item_id = $_POST['cart_item_id'];

$sql = "DELETE FROM CartItem WHERE cart_item_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $cart_item_id);
$stmt->execute();

header("Location: cart.php");
exit();
?>