<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duckxtreme</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">

        <div class="navbar">
            <div class="logo">
                <img src="picture/Logo.png" alt="DuckXtreme Logo">
            </div>

            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.html">Store</a></li>
                    <li><a href="cart.php">Cart</a></li>

                    <?php if (isset($_SESSION['customer_id'])): ?>
                        <li>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="account.html">Login/Register</a></li>
                    <?php endif; ?>

                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-2">
                <h1>Welcome to Duckxtreme!</h1>
                <p>Discover the ultimate duck shopping experience. Shop cute, colorful, glittery, and collectible mini ducks.</p>
                <a href="shop.html" class="btn">Shop Now</a>
            </div>

            <div class="col-2">
                <img src="picture/duckOfducks.jpeg" class="hero-img" alt="Duck of Ducks">
            </div>
        </div>

    </div>

</body>
</html>