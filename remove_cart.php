<?php
session_start();
require_once "db_connect.php";

if (!isset($_SESSION['customer_id'])) {
    header("Location: account.php");
    exit();
}

$cart_item_id = $_POST['cart_item_id'];

// check current quantity
$sql = "SELECT quantity FROM CartItem WHERE cart_item_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $cart_item_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if ($row['quantity'] > 1) {
        // 🔽 decrease by 1
        $sql = "UPDATE CartItem SET quantity = quantity - 1 WHERE cart_item_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $cart_item_id);
        $stmt->execute();
    } else {
        // ❌ delete if only 1 left
        $sql = "DELETE FROM CartItem WHERE cart_item_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $cart_item_id);
        $stmt->execute();
    }
}

header("Location: cart.php");
exit();
?>