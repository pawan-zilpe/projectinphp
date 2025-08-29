<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_no = $_POST['account_no'];
    $cvv = $_POST['cvv'];
    $amount = $_POST['amount'];
    $user_id = $_SESSION['user_id'];

    // Dummy validation (Real-world में, Payment Gateway से verify करेंगे)
    if (strlen($account_no) < 8 || strlen($cvv) != 3 || $amount <= 0) {
        echo "Invalid payment details!";
        exit;
    }

    // Save payment details in database
    $sql = "INSERT INTO payments (user_id, account_no, amount, status) VALUES ('$user_id', '$account_no', '$amount', 'success')";

    if (mysqli_query($conn, $sql)) {
        // Order को paid mark कर दो
        $update_sql = "UPDATE orders SET payment_status='paid' WHERE user_id='$user_id' ORDER BY id DESC LIMIT 1";
        mysqli_query($conn, $update_sql);

        header("Location: order_confirm.php");
    } else {
        echo "Payment failed: " . mysqli_error($conn);
    }
}
?>
