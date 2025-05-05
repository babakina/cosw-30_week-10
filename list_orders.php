<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="tstyles.css">
<title>List Orders</title>
</head>
<body>
<header>
	<h1>Week 10 Homework</h1>
	<nav>
    <a href="https://eridanus.webdevlearning.org/COSW-30/Week-10/list_users.php">List Users</a>
			<a href="https://eridanus.webdevlearning.org/COSW-30/Week-10/list_products.php">List Products</a>
			<a href="https://eridanus.webdevlearning.org/COSW-30/Week-10/list_orders.php">List Orders</a>
			<a href="https://eridanus.webdevlearning.org/COSW-30/Week-10/add_user.php">Add User</a>
			<a href="https://eridanus.webdevlearning.org/COSW-30/Week-10/add_product.php">Add Product</a>
			<a href="https://eridanus.webdevlearning.org/COSW-30/Week-10/add_order.php">Add Order</a>
	</nav>
</header>
<h2>Customer Orders</h2>
<div>
<?php 

require 'dbconnection.php';

//SQL query to fetch all users
$sql = "SELECT order_id, product_id, user_id, order_status FROM orders";
$result = mysqli_query($connection, $sql);

//check if there are results
if ($result && mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>ID</th><th>Product ID</th><th>User ID</th><th>Order Status</th></tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["order_id"] . "</td>";
        echo "<td>" . $row["product_id"] . "</td>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["order_status"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>
</div>
</body>
</html>