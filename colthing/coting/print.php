<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $print_design = $_POST['print_design'];
    
    // Custom image upload handling
    if (!empty($_FILES['custom_image']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["custom_image"]["name"]);
        move_uploaded_file($_FILES["custom_image"]["tmp_name"], $target_file);
        $print_design = $target_file;
    }

    $sql = "UPDATE orders SET print_design = '$print_design' WHERE user_id = '$user_id' ORDER BY id DESC LIMIT 1";

    if (mysqli_query($conn, $sql)) {
        header("Location: payment.php");
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
    <title>Select Print</title>
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

/* Select and file input styling */
select, input[type="file"] {
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

/* Hover effect for the select and file input fields */
select:hover, input[type="file"]:hover {
    border-color: #007BFF;
}

/* Focus effect for the select and file input fields */
select:focus, input[type="file"]:focus {
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

    select, input[type="file"] {
        font-size: 14px;
    }

    button {
        font-size: 14px;
    }
}


    </style>
</head>
<body>

    <h2>Select Your Print Design</h2>
    <form method="post" enctype="multipart/form-data">
        <label>Choose Pre-Defined Print:</label>
        <select name="print_design">
            <option value="design1.jpg">Design 1</option>
            <option value="design2.jpg">Design 2</option>
            <option value="design3.jpg">Design 3</option>
        </select>

        <!--<label>Or Upload Your Own Design:</label>-->

        <button type="submit">Next: Payment</button>
    </form>

</body>
</html>
