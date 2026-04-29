<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Duckxtreme Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">

    <div class="navbar">
        <div class="logo">
            <img src="picture/nLogo.png" alt="DuckXtreme Logo">
        </div>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.html">Store</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="account.html">Login/Register</a></li>
            </ul>
        </nav>
    </div>

    <h1 class="page-title">Shopping Cart</h1>

    <div id="cart-items">
        <?php include "display_cart.php"; ?>
    </div>
    
    <h2 class="cart-total">Total: $<?php echo number_format($total, 2); ?></h2>

    <button class="checkout-btn">Checkout</button>

</div>

</body>
</html>