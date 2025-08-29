<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $payment_status = $_POST['payment_status'];

    $sql = "UPDATE orders SET payment_status='$payment_status' WHERE id='$order_id'";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: admin_dashboard.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
