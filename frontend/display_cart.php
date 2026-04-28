<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['customer_id'])) {
    die("You must be logged in");
}

$customer_id = $_SESSION['customer_id'];

// get cart
$sql = "SELECT cart_id FROM Cart WHERE customer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Cart is empty";
    exit();
}

$cart_id = $result->fetch_assoc()['cart_id'];

// get items
$sql = "
SELECT CartItem.cart_item_id, Product.product_name, Product.price, CartItem.quantity
FROM CartItem
JOIN Product ON CartItem.product_id = Product.product_id
WHERE CartItem.cart_id = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $cart_id);
$stmt->execute();
$result = $stmt->get_result();

$total = 0;
?>

<h1>Your Cart</h1>

<?php while ($row = $result->fetch_assoc()): 
    $subtotal = $row['price'] * $row['quantity'];
    $total += $subtotal;
?>

<div>
    <h3><?php echo $row['product_name']; ?></h3>
    <p>$<?php echo $row['price']; ?> x <?php echo $row['quantity']; ?></p>
    <p>Subtotal: $<?php echo number_format($subtotal, 2); ?></p>

    <form action="remove_item.php" method="POST">
        <input type="hidden" name="cart_item_id" value="<?php echo $row['cart_item_id']; ?>">
        <button type="submit">Remove</button>
    </form>
</div>

<?php endwhile; ?>

<h2>Total: $<?php echo number_format($total, 2); ?></h2>