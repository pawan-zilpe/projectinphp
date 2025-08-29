<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
    } else {
        echo "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">

        /* General body setup */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
}

/* Form container */
form {
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
    opacity: 0;
    transform: translateY(-50px);
    animation: fadeInUp 1s forwards;
}

/* Fade-in-up animation */
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(-50px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Label styles */
label {
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    color: #333;
    text-align: left;
}

/* Input fields styles */
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
    background-color: #fafafa;
    box-sizing: border-box;
    transition: all 0.3s ease-in-out;
}

/* Focus effect on inputs */
input[type="email"]:focus,
input[type="password"]:focus {
    border-color: #007BFF;
    background-color: #fff;
    transform: scale(1.02);
}

/* Button styles */
button {
    background-color: #007BFF;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    width: 100%;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

/* Button hover animation */
button:hover {
    background-color: #0056b3;
    transform: translateY(-5px);
}

/* Button active animation */
button:active {
    transform: translateY(1px);
}

/* Success or error message styling */
p {
    font-size: 14px;
    color: #ff0000;
}



    </style>
</head>
<body>

<form method="post">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
</body>
</html>
