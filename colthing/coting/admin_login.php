<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $admin = mysqli_fetch_assoc($result);

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_styles.css">
    <style type="text/css">
        /* Reset some default styling for the body */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Centering the form and adding background */
form {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
}

/* Header styles */
h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Label styles */
label {
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    color: #333;
}

/* Input fields styling */
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

/* Button styling */
button {
    background-color: #007BFF;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    width: 100%;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

/* Error message styling */
p {
    font-size: 14px;
    color: #555;
}

p a {
    color: #007BFF;
    text-decoration: none;
}

p a:hover {
    text-decoration: underline;
}

/* Styling the error message */
p[style="color:red;"] {
    color: red;
}


    </style>
</head>
<body>

    <h2>Admin Login</h2>
    <form method="post">
        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <p>New Admin? <a href="admin_signup.php">Signup here</a></p>

</body>
</html>
