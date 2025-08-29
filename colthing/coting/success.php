<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$payment_id = $_GET['payment_id'];
$user_id = $_SESSION['user_id'];

$sql = "UPDATE orders SET payment_status='paid' WHERE user_id='$user_id' ORDER BY id DESC LIMIT 1";
mysqli_query($conn, $sql);

echo "Payment Successful! Your Payment ID: " . $payment_id;
header("refresh:3;url=index.php"); // 3 sec baad home page pe redirect
?>
