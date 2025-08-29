<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Password Hashing

    // Check if username already exists
    $check_sql = "SELECT * FROM admins WHERE username='$username'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $error = "Username already exists!";
    } else {
        // Insert new admin
        $sql = "INSERT INTO admins (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $sql)) {
            header("Location: admin_login.php");
            exit;
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <link rel="stylesheet" href="admin_styles.css">
    <style type="text/css">

        /* Page Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Signup Form Styling */
form {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
}

/* Input Fields */
input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Submit Button */
button {
    background: #007bff;
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 5px;
    font-size: 16px;
}

button:hover {
    background: #0056b3;
}

/* Error Message */
p {
    color: red;
    font-weight: bold;
}

/* Login Link */
a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}


    </style>
</head>
<body>

    <h2>Admin Signup</h2>
    <form method="post">
        <label>Username:</label>
        <input type="text" name="username" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Signup</button>
    </form>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <p>Already have an account? <a href="admin_login.php">Login here</a></p>

</body>
</html>
