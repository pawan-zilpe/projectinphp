<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="styles.css">
    <style type="text/css">
        /* General body setup */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
}

/* Form container styling */
form {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    width: 350px;
    text-align: center;
    opacity: 0;
    transform: translateY(-50px);
    animation: fadeInUp 1s forwards;
}

/* Header styling */
h2 {
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
    opacity: 0;
    transform: translateY(-50px);
    animation: fadeInUp 1s forwards 0.5s;
}

/* Label styling */
label {
    display: block;
    margin-bottom: 10px;
    font-size: 16px;
    color: #666;
    text-align: left;
}

/* Input fields styling */
input[type="text"],
input[type="password"],
input[type="number"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    background-color: #fafafa;
    box-sizing: border-box;
    outline: none;
    transition: border-color 0.3s, background-color 0.3s;
}

/* Hover effect for the input fields */
input[type="text"]:hover,
input[type="password"]:hover,
input[type="number"]:hover {
    border-color: #007BFF;
}

/* Focus effect for the input fields */
input[type="text"]:focus,
input[type="password"]:focus,
input[type="number"]:focus {
    border-color: #007BFF;
    background-color: #fff;
}

/* Button styling */
button {
    background-color: #007BFF;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    width: 100%;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

/* Button hover effect */
button:hover {
    background-color: #0056b3;
    transform: translateY(-5px);
}

/* Button active effect */
button:active {
    transform: translateY(1px);
}

/* Animation for fading in and sliding up */
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
    form {
        width: 90%;
    }

    h2 {
        font-size: 24px;
    }

    label {
        font-size: 14px;
    }

    input[type="text"],
    input[type="password"],
    input[type="number"] {
        font-size: 14px;
    }

    button {
        font-size: 14px;
    }
}

    </style>
</head>
<body>

    <h2>Payment Page</h2>
    <form action="process_payment.php" method="post">
        <label>Account Number:</label>
        <input type="text" name="account_no" required>

        <label>CVV:</label>
        <input type="password" name="cvv" required>

        <label>Amount:</label>
        <input type="number" name="amount" required>

        <button type="submit">Pay Now</button>
    </form>

</body>
</html>
