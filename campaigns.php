<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Campaigns</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <style>
    /* Custom CSS for campaigns page */
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .campaigns-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      grid-gap: 20px;
    }

    .campaign-card {
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 20px;
      background-color: #f9f9f9;
      text-align: center;
    }

    .campaign-card img {
      width: 100%;
      max-height: 200px;
      object-fit: cover;
      border-radius: 4px;
    }

    .campaign-card h2 {
      margin-top: 20px;
      font-size: 20px;
    }

    .campaign-card p {
      margin-top: 10px;
      font-size: 14px;
    }

    .campaign-info {
      margin-top: 20px;
      font-size: 12px;
      color: #666;
    }

    .btn-donate {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #ff3366;
      color: #fff;
      border: none;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
    }

    .btn-donate:hover {
      background-color: #ff204b;
    }
  </style>
</head>
<body>
<header class="header">
        <img src="logo.png" alt="My Website Logo">
    </header>
    <!-- Navigation Bar -->
    <nav class="navbar">
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="campaigns.php">Campaigns</a></li>
    <li><a href="createcampaign/create_campaign.php">Start a Campaign</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact us</a></li>
    <?php
      $isLoggedIn = isset($_SESSION['loggedIn']);

      if ($isLoggedIn) {
        $userEmail = $_SESSION['loggedIn'];
        echo '
          <li class="navbar-btns">
            <a href="profile.php" class="btn-profile"><i class="fas fa-user"></i></a>
            <a href="logout.php" class="btn-logout">Sign Out</a>
          </li>
        ';
      }
       else {
        echo '
          <li class="navbar-btns">
            <a href="login/login.php" class="btn-login">Login</a>
            <a href="signup/signup.php" class="btn-signup">Sign Up</a>
          </li>
        ';
      }
    ?>
  </ul>
</nav>
<main>
  <div class="container">
    <h1>Explore Campaigns</h1>

    <div class="campaigns-container">
      <?php
        // Retrieve campaigns from the database and display them as cards
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $database = "your_database";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM campaigns";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $campaignId = $row['id'];
            $image = $row['image'];
            $title = $row['title'];
            $description = $row['description'];
            $donationCount = $row['donation_count'];
            $amountRaised = $row['amount_raised'];
      ?>
            <div class="campaign-card">
              <a href="campaign_details.php?id=<?php echo $campaignId; ?>">
                <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
                <h2><?php echo $title; ?></h2>
                <p><?php echo $description; ?></p>
                <div class="campaign-info">
                  <span><?php echo $donationCount; ?> Donations</span>
                  <span>Amount Raised: <?php echo $amountRaised; ?></span>
                </div>
                <button class="btn-donate">Donate</button>
              </a>
            </div>
      <?php
          }
        } else {
          echo "<p>No campaigns found.</p>";
        }

        $conn->close();
      ?>
    </div>
  </div>
</main>
<footer>
 <div class="footer-links">
     <ul>
         <li><a href="">About</a></li>
         <li><a href="">Services</a></li>
         <li><a href="">Pricing</a></li>
         <li><a href="">Blog</a></li>
         <li><a href="">Contact</a></li>
     </ul>
 </div>
 <div class="footer-social">
     <h4>Follow Us</h4>
     <ul>
         <li><i class="fab fa-facebook" style="width: 50px;height:70px"></i>
         </li>
         <li><i class="fab fa-twitter" id="icon11"></i>
         </li>
         <li><i class="fab fa-instagram" id="icon11"></i>
         </li>
         <li><i class="fab fa-linkedin" id="icon11"></i>
         </li>
     </ul>
 </div>
 <div class="footer-legal">
     <p>&copy; 2023 Example Company. All rights reserved.</p>
     <p><a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a></p>
 </div>
</footer>
</body>
</html>