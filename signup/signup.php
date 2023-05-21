<?php
session_start(); // Start the session

// Check if the user is already logged in, redirect to homepage
if (isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Validate form data (you can add more validation as per your requirements)

  // Connect to the database
  $servername = "localhost";
  $username = "username";
  $db_password = "123";
  $database = "crowdfund";
  
  $conn = new mysqli($servername, $username, $db_password, $database);
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  // Prepare and execute the SQL query
  $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
  if ($conn->query($sql) === TRUE) {
    // Registration successful
    $_SESSION['username'] = $email; // Set session variable
    header("Location: index.php"); // Redirect to homepage or user profile page
    exit();
  } else {
    // Registration failed
    $error = "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the database connection
  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="signup-container">
      <div class="signup-header">
        <h2>Sign Up</h2>
      </div>
      <div class="signup-card">
        <form action="signup.php" method="POST">
          <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>
          </div>
          <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <p class="password-requirements">Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.</p>
          </div>
          <?php if (isset($error)) { ?>
            <div class="error-message"><?php echo $error; ?></div>
          <?php } ?>
          <div class="form-group">
            <input type="checkbox" id="terms" name="terms" required>
            <label for="terms">I agree to the Terms of Service and Privacy Policy</a>.</label>
          </div>
          <p>Already have an account? <a href="../login/login.php">Log in</a></p>
          <div class="form-group">
            <button type="submit">Sign Up</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>