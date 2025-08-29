<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$order = mysqli_fetch_assoc($result);

if (!$order || $order['payment_status'] != 'paid') {
    echo "No confirmed order found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style type="text/css">
        
        /* General body setup */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f7fc;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
    text-align: center;
}

/* Order confirmation container */
h2 {
    font-size: 28px;
    color: #333;
    margin-bottom: 30px;
    opacity: 0;
    transform: translateY(-50px);
    animation: fadeInUp 1s forwards 0.5s;
}

/* Order details styling */
p {
    font-size: 18px;
    color: #333;
    margin: 10px 0;
    opacity: 0;
    transform: translateY(-20px);
    animation: fadeInUp 1s forwards;
}

/* Specific styling for color block */
span {
    display: inline-block;
    border-radius: 5px;
    margin-top: 5px;
    width: 50px;
    height: 20px;
}

/* Print image styling */
img {
    border-radius: 8px;
    margin-top: 10px;
}

/* Link styling */
a {
    display: inline-block;
    margin-top: 20px;
    font-size: 18px;
    color: #007BFF;
    text-decoration: none;
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 1s forwards 1s;
}

/* Hover effect for the link */
a:hover {
    text-decoration: underline;
}

/* Fade-in-up animation */
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Mobile responsiveness */
@media (max-width: 480px) {
    body {
        padding: 10px;
    }

    h2 {
        font-size: 24px;
    }

    p {
        font-size: 16px;
    }

    a {
        font-size: 16px;
    }
}

    </style>
</head>
<body>

    <h2>Order Confirmed! 🎉</h2>
    <p><strong>Fabric:</strong> <?php echo $order['fabric']; ?></p>
    <p><strong>Color:</strong> <span style="background:<?php echo $order['color']; ?>; padding: 5px 10px;">&nbsp;</span></p>
    <!--<p><strong>Print:</strong> <img src="<?php echo $order['print_design']; ?>" width="100"></p>-->
    <p><strong>Payment Status:</strong> ✅ Paid</p>

    <a href="index.php">Back to Home</a>

</body>
</html>
