<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fstyles.css">
    <title>Add Products Form</title>
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
    <main>
                <h2>Add Product</h2>
                <form action="add_product.php" method="post">
                  <span class="line-break">
                    <label for="product-name">Film title:</label>
                    <input type="text" name="product-name" id="product-name" placeholder="title" value="<?php if (isset($_POST['product-name'])) { print htmlspecialchars($_POST['product-name']); } ?>">
</span>
                  <span class="line-break">
					          <label for="release-year">Year released:</label>
                    <input type="number" name="release-year" id="release-year" placeholder="19xx" min="1878">
</span>
                  <input type="submit" value="Submit" id="submit" class="clay">

<?php

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $problem = false; // No problems so far. 

  // Check for each value...
  if (empty($_POST['product-name'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter the film name.</span></p>';
   }

  if (empty($_POST['release-year'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter your the year the film was released.</span></p>';
   }

  if (empty($_POST['email'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter your email address.</span></p>';
  } 

  if (!$problem) { // If there weren't any problems...

    // Add user to database

    $productname = $_POST['product-name'];
    $releaseyear = $_POST['release-year'];

    require('dbconnection.php');

    $sql = "INSERT INTO products (product_name, release_year)
    VALUES ('" . $productname . "','" . $releaseyear . "')";

    if (mysqli_query($connection, $sql)) {
     echo '<p><span class="form-success">' . $productname . ' ' . $releaseyear . ' added as a new product.</span></p>';
    } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($connection);
     }

    mysqli_close($connection);   

    // Clear the posted values:
    $_POST = [];

  } else { // Forgot a field.
      print '<p><span class="form-error">Please try again!</span></p>';   
  }

} // End of handle form IF.

?>
                </form>
    </main>
</body>
</html>