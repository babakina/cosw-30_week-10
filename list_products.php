<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="tstyles.css">
<title>List Products</title>
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
<h2>Films</h2>
<div>
<?php 

require 'dbconnection.php';

//SQL query to fetch all users
$sql = "SELECT product_id, product_name, release_year FROM products";
$result = mysqli_query($connection, $sql);

//check if there are results
if ($result && mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>ID</th><th>Film Name</th><th>Year</th></tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["product_id"] . "</td>";
        echo "<td>" . $row["product_name"] . "</td>";
        echo "<td>" . $row["release_year"] . "</td>";
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