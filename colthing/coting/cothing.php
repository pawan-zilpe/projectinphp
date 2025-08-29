
<?php
session_start();
include 'db.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <style>

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
                <li><a href="cothing.php">all colth</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
                 <li><a href="signup.php">SignUp</a></li>
            <?php } ?>
        </ul>
    </nav>


<div class="container">
  

    <!-- Product Details -->
    <div class="product-details">
        <img src="data:image/jpeg;base64,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" alt="Product Image" width="100%">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="payment.php">
           <button class="pay now">PAY NOW</button>
        </form>
    </div>

    <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image" width="100%">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="payment.php">
           <button class="pay now">PAY NOW</button>
        </form>
    </div>

    <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image" width="100%">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="payment.php">
           <button class="pay now">PAY NOW</button>
        </form>
    </div>

    <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image" width="100%">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="payment.php">
           <button class="pay now">PAY NOW</button>
        </form>
    </div>

    <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image" width="100%">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="payment.php">
           <button class="pay now">PAY NOW</button>
        </form>
    </div>

    <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image" width="100%">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="payment.php">
           <button class="pay now">PAY NOW</button>
        </form>
    </div>

    <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image" width="100%">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="payment.php">
           <button class="pay now">PAY NOW</button>
        </form>
    </div>

    <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image" width="100%">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="payment.php">
           <button class="pay now">PAY NOW</button>
        </form>
    </div>

     <!-- Product Details -->
    <div class="product-details">
        <img src="https://via.placeholder.com/400" alt="Product Image" width="100%">
        <h1>Product Name</h1>
        <p class="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
        <p class="price">$99.99</p>
        <form action="payment.php">
           <button class="pay now">PAY NOW</button>
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


    
</div>

  <!-- Footer -->
    <footer>
        <p>&copy; 2025 ClothingStore. All rights reserved.</p>
    </footer>


</body>
</html>
