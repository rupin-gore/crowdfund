<!DOCTYPE html>
<html>

<head>
    <title>Create Campaign</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!-- Link to external JavaScript file -->
    <script src="script.js"></script>
</head>

<body>
    <?php
    // Check if the user is logged in, redirect to signup/login page if not
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $amount = $_POST['amount'];

        // Store the campaign information in the database
        // Connect to the database
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $database = "your_database";

        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the user ID of the logged-in user
        $userId = $_SESSION['user_id'];

        // Prepare and execute the SQL query to insert the campaign information
        $sql = "INSERT INTO campaigns (user_id, city, state, zipcode, title, description, amount) 
                VALUES ('$userId', '$city', '$state', '$zipcode', '$title', '$description', '$amount')";
        if ($conn->query($sql) === TRUE) {
            // Campaign creation successful
            echo "Campaign created successfully!";
            // You can redirect to a success page or any other page here
        } else {
            // Campaign creation failed
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?>

    <header class="header">
        <img src="logo.png" alt="My Website Logo">
    </header>

    <div class="container">
        <h1>Create a Campaign</h1>
        <form action="create_campaign.html" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" id="state" name="state" required>
            </div>
            <div class="form-group">
                <label for="zipcode">Zipcode:</label>
                <input type="text" id="zipcode" name="zipcode" required>
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="amount">Amount to be Raised (in Rupees):</label>
                <input type="number" id="amount" name="amount" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
            </div>
            <div class="form-group">
                <button type="submit">Create Campaign</button>
            </div>
        </form>
    </div>

    <footer class="footer">
        <p>&copy; 2023 Your Website. All rights reserved.</p>
    </footer>
</body>

</html>