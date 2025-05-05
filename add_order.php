<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="fstyles.css">
	<title>Add Orders Form</title>
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
		<h2>Add Order</h2>
		<form action="add_product.php" method="post">
			<span class="line-break">
				<label for="product-id">Film title:</label>
				<select name="product-id" id="product-id">
					<option value="1">The Dirties</option>
					<option value="2">Drylongso</option>
					<option value="3">3-Iron</option>
					<option value="4">The Host</option>
					<option value="5">Hackers</option>
					<option value="6">The Battle of Algiers</option>
					<option value="7">Portrait of a Lady on Fire</option>
					<option value="8">Joint Security Area</option>
					<option value="9">Daises</option>
					<option value="10">Quadrophenia</option>
					<option value="11">Perfect Days</option>
					<option value="12">Okja</option>
					<option value="13">Nope</option>
					<option value="14">Swing Kids</option>
					<option value="15">The Age of Shadows</option>
					<option value="16">Assassination</option>
					<option value="17">The Net</option>
					<option value="18">Promare</option>
					<option value="19">Oasis</option>
					<option value="20">My Own Private Idaho</option>
				</select>
			</span>
			<span class="line-break">
				<label for="user-id">Customer ID:</label>
				<input type="number" name="user-id" id="user-id" placeholder="" min="1" max="20">
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

		</form>
	</main>
</body>

</html>