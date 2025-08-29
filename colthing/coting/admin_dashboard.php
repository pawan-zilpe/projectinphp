<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

// Fetch all orders
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>

    <h2>Admin Dashboard</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Fabric</th>
            <th>Color</th>
            <th>Print</th>
            <th>Payment Status</th>
            <th>Actions</th>
        </tr>
        
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['fabric']; ?></td>
            <td><span style="background:<?php echo $row['color']; ?>; padding: 5px 10px;">&nbsp;</span></td>
            <td><img src="<?php echo $row['print_design']; ?>" width="50"></td>
            <td><?php echo $row['payment_status']; ?></td>
            <td>
                <form method="post" action="update_order.php">
                    <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                    <select name="payment_status">
                        <option value="pending" <?php if ($row['payment_status'] == 'pending') echo 'selected'; ?>>Pending</option>
                        <option value="paid" <?php if ($row['payment_status'] == 'paid') echo 'selected'; ?>>Paid</option>
                    </select>
                    <button type="submit">Update</button>
                </form>
                <form method="post" action="delete_order.php">
                    <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" onclick="return confirm('Are you sure?');">Delete</button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

    <a href="logout.php">Logout</a>

</body>
</html>
