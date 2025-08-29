<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $fabric = $_POST['fabric'];
    $color = $_POST['color'];

    $sql = "INSERT INTO orders (user_id, fabric, color) VALUES ('$user_id', '$fabric', '$color')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: print.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Fabric</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General reset and setup */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

/* Container for the form */
form {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    width: 350px;
    text-align: center;
    box-sizing: border-box;
}

/* Header for the form */
h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
    font-weight: bold;
}

/* Label styling */
label {
    display: block;
    margin-bottom: 10px;
    font-size: 16px;
    color: #666;
    text-align: left;
}

/* Select box styling */
select, input[type="color"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    background-color: #fff;
    color: #333;
    box-sizing: border-box;
    outline: none;
}

/* Hover effect for the select and input fields */
select:hover, input[type="color"]:hover {
    border-color: #007BFF;
}

/* Submit button styling */
button {
    background-color: #007BFF;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    width: 100%;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Button hover effect */
button:hover {
    background-color: #0056b3;
}

/* Focus effect for inputs */
select:focus, input[type="color"]:focus {
    border-color: #007BFF;
}

/* Optional, styling the background of the color input */
input[type="color"]::-webkit-color-swatch-wrapper {
    padding: 0;
}

input[type="color"]::-webkit-color-swatch {
    border: none;
    border-radius: 5px;
}

/* A little spacing around the form */
form {
    box-sizing: border-box;
}

/* Mobile responsiveness */
@media (max-width: 480px) {
    form {
        width: 90%;
    }
}

    </style>
</head>
<body>

    <h2>Select Your Fabric & Color</h2>
    <form method="post">
        <label>Choose Fabric:</label>
        <select name="fabric" required>
            <option value="Cotton">Cotton</option>
            <option value="Silk">Silk</option>
            <option value="Linen">Linen</option>
            <option value="Wool">Wool</option>
        </select>

        <label>Choose Color:</label>
        <input type="color" name="color" required>

        <button type="submit">Next: Choose Print</button>
    </form>

</body>
</html>
