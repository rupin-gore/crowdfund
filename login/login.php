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
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Validate form data (you can add more validation as per your requirements)

  // Connect to the database
  $servername = "localhost";
  $username = "username";
  $password = "123";
  $database = "crowdfund";
  
  $conn = new mysqli($servername, $username, $password, $database);
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  // Prepare and execute the SQL query
  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = $conn->query($sql);

  // Check if the query returned any rows
  if ($result->num_rows > 0) {
    // User authentication successful
    $_SESSION['username'] = $email; // Set session variable
    header("Location: index.php"); // Redirect to homepage or user profile page
    exit();
  } else {
    // User authentication failed
    $error = "Invalid email or password";
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
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  <div class="container">
    <div class="login-container">
      <div class="login-header">
        <h2>Welcome Back!</h2>
        <p>Sign in to access your account.</p>
      </div>
      <div class="login-card">
        <h2><i class="fas fa-lock"></i> Login</h2>
        <form action="login.php" method="POST">
          <div class="form-group">
            <label for="email"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" name="email" id="email" required>
          </div>
          <div class="form-group">
            <label for="password"><i class="fas fa-lock"></i> Password</label>
            <input type="password" name="password" id="password" required>
          </div>
          <?php if (isset($error)) { ?>
            <div class="error-message"><?php echo $error; ?></div>
          <?php } ?>
          <div class="form-group">
            <button type="submit" name="login"><i class="fas fa-sign-in-alt"></i> Sign In</button>
          </div>
        </form>
        <p>Don't have an account? <a href="../signup/signup.php">Sign up</a></p>
      </div>
    </div>
  </div>
</body>
</html>