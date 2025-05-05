<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fstyles.css">
    <title>Add Users Form</title>
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
                <h2>Add User</h2>
                <form action="add_user.php" method="post">
                  <span class="line-break">
                    <label for="first-name">First Name:</label>
                    <input type="text" name="first-name" id="first-name" placeholder="First Name" value="<?php if (isset($_POST['first-name'])) { print htmlspecialchars($_POST['first-name']); } ?>">
</span>
                  <span class="line-break">
					          <label for="last-name">Last Name:</label>
                    <input type="text" name="last-name" id="last-name" placeholder="Last Name" value="<?php if (isset($_POST['last-name'])) { print htmlspecialchars($_POST['last-name']); } ?>">
</span>
                  <span class="line-break">
					          <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Email" value="<?php if (isset($_POST['email'])) { print htmlspecialchars($_POST['email']); } ?>"><br />
</span>
                  <label for="password">Password:</label>                  
                  <input type="password" name="password" id="password" placeholder="password">
                  <input type="password" name="confirm-password" id="confirm-password" placeholder="confirm password">
                  <input type="submit" value="Submit" id="submit" class="clay">

<?php

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $problem = false; // No problems so far. 

  // Check for each value...
  if (empty($_POST['first-name'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter your first name.</span></p>';
   }

  if (empty($_POST['last-name'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter your last name.</span></p>';
   }

  if (empty($_POST['email'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter your email address.</span></p>';
  }

  if (empty($_POST['password'])) {
    $problem = true;
    print '<p><span class="form-error">Please enter a password!</span></p>';
  }

  if ($_POST['password'] != $_POST['confirm-password']) {
    $problem = true;
    print '<p><span class="form-error">Your password did not match your confirmed password!</span></p>';
   } 

  if (!$problem) { // If there weren't any problems...

    // Add user to database

    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    require('dbconnection.php');

    $sql = "INSERT INTO users_tbl (first_name, last_name, email, password)
    VALUES ('" . $firstname . "','" . $lastname . "','" . $email . "','" . $password . "')";

    if (mysqli_query($connection, $sql)) {
     echo '<p><span class="form-success">' . $firstname . ' ' . $lastname . ' added as a new user.</span></p>';
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