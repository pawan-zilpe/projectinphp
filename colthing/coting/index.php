<?php
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store</title>
    <link rel="stylesheet" href="styles.css">
    <style type="text/css">

        /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Navbar Styles */
nav {
    background-color: #333;
    padding: 10px 20px;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav .logo {
    font-size: 24px;
    font-weight: bold;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul li {
    margin: 0 10px;
}

nav ul li a {
    text-decoration: none;
    color: white;
    font-size: 16px;
}

nav ul li a:hover {
    color: #ddd;
}

/* Product Container */
.container {
    width: 90%;
    margin: 20px auto;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

/* Product Card */
.product-details {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding: 20px;
    text-align: center;
    transition: transform 0.3s ease;
}

.product-details:hover {
    transform: translateY(-10px);
}

/* Product Image */
.product-details img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

/* Product Title */
.product-details h1 {
    font-size: 20px;
    color: #333;
    margin: 10px 0;
}

/* Product Description */
.product-description {
    font-size: 14px;
    color: #666;
    margin-bottom: 15px;
}

/* Price */
.price {
    font-size: 18px;
    font-weight: bold;
    color: #000;
}

/* Pay Now Button */
button.pay {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 12px 25px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

button.pay:hover {
    background-color: #218838;
}

/* Footer */
footer {
    background-color: #333;
    color: white;
    padding: 20px;
    text-align: center;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 95%;
    }

    .product-details h1 {
        font-size: 18px;
    }

    .product-description {
        font-size: 13px;
    }
}


    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <div class="logo">ClothingStore</div>
        <ul>
            
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li><a href="index.php">Home</a></li>
                <li><a href="fabric.php">Fabric</a></li>
                <li><a href="Cothing.php">all colth</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="admin_login.php">Admin</a></li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                 <li><a href="signup.php">SignUp</a></li>
            <?php } ?>
        </ul>
    </nav>

    <!-- Banner -->
    <header>
        <h1>Customize Your T-Shirts</h1>
        <p>Choose fabric, color & upload your design!</p>
        <a href="fabric.php" class="btn">Start Customizing</a>
    </header>

    <!-- Products Section -->
  <!--  <section class="products">
        <h2>Our Best Sellers</h2>
        <div class="product-grid">
            <?php
            $sql = "SELECT * FROM products LIMIT 6";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
             <div class="product">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDpkk2d_xPwcEf6G6pOXF127Ppvsle4DRWgw&s" alt="T-Shirt">
                <h3><?php echo $row['name']; ?></h3>
                <p>₹<?php echo $row['price']; ?></p>
                <a href="fabric.php?id=<?php echo $row['id']; ?>" class="btn">Customize</a>
            </div>
            <?php } ?>
        </div>
    </section>-->

    <!-- Product Container -->
<div class="container">


    <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="fabric.php">
            <button class="pay">PAY NOW</button>
        </form>
    </div>

     <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="fabric.php">
            <button class="pay">PAY NOW</button>
        </form>
    </div>


 <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="fabric.php">
            <button class="pay">PAY NOW</button>
        </form>
    </div>


 <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="fabric.php">
            <button class="pay">PAY NOW</button>
        </form>
    </div>


 <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="fabric.php">
            <button class="pay">PAY NOW</button>
        </form>
    </div>


 <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="fabric.php">
            <button class="pay">PAY NOW</button>
        </form>
    </div>
  <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="fabric.php">
            <button class="pay">PAY NOW</button>
        </form>
    </div>

 <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="fabric.php">
            <button class="pay">PAY NOW</button>
        </form>
    </div>
 <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="fabric.php">
            <button class="pay">PAY NOW</button>
        </form>
    </div>
 <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="fabric.php">
            <button class="pay">PAY NOW</button>
        </form>
    </div>
 <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="fabric.php">
            <button class="pay">PAY NOW</button>
        </form>
    </div>
 <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="fabric.php">
            <button class="pay">PAY NOW</button>
        </form>
    </div>






    <!-- Repeat the product details as needed for other products -->

</div>


    <!-- Footer -->
    <footer>
        <p>&copy; 2025 ClothingStore. All rights reserved.</p>
    </footer>

</body>
</html>
