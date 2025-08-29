<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];

    $sql = "DELETE FROM orders WHERE id='$order_id'";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: admin_dashboard.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
