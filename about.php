<!DOCTYPE html>
<html>

<head>
    <title>GoFundMe Clone - Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!-- Link to external JavaScript file -->
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css">
</head>

<body>
    <header class="header">
        <img src="logo.png" alt="My Website Logo">
    </header>
    <!-- Navigation Bar -->
    <nav class="navbar">
  <ul>
    <li><a href="home.php">Home</a></li>
    <li><a href="campaigns.php">Campaigns</a></li>
    <li><a href="create_campaign.php">Start a Campaign</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact us</a></li>
    <?php
      session_start();
      $isLoggedIn = isset($_SESSION['loggedIn']);

      if ($isLoggedIn) {
        $userEmail = $_SESSION['loggedIn'];
        echo '
          <li class="navbar-btns">
            <a href="profile.php" class="btn-profile"><i class="fas fa-user"></i></a>
            <a href="logout.php" class="btn-logout">Sign Out</a>
          </li>
        ';
      } else {
        echo '
          <li class="navbar-btns">
            <a href="login.php" class="btn-login">Login</a>
            <a href="signup.php" class="btn-signup">Sign Up</a>
          </li>
        ';
      }
    ?>
  </ul>
</nav>
    <!-- Main content -->
    <main>
     <section>
       <h2>What is Crowdfunding?</h2>
       <p>Crowdfunding is a way for individuals, organizations, and businesses to raise funds for various projects, causes, or ventures by collecting small contributions from a large number of people, typically through an online platform.</p>
     </section>
 
     <section>
       <h2>How Does Our Crowdfunding Platform Work?</h2>
       <p>At our crowdfunding platform, we provide a user-friendly and secure environment for fundraisers to create campaigns and connect with potential donors. Here's how it works:</p>
 
       <ol>
         <li><strong>Create a Campaign:</strong> Fundraisers create a campaign by providing details about their project, cause, or venture. They set a fundraising goal and specify a deadline.</li>
         <li><strong>Spread the Word:</strong> Fundraisers share their campaign with friends, family, and their social networks through various channels such as social media, email, and word-of-mouth.</li>
         <li><strong>Receive Donations:</strong> Supporters can visit the campaign page and contribute funds towards the project. They can make donations of any amount and choose different reward levels if available.</li>
         <li><strong>Track Progress:</strong> Fundraisers can monitor the progress of their campaign, including the total amount raised, the number of donors, and the remaining time. They can also engage with donors through comments and updates.</li>
         <li><strong>Reach the Goal:</strong> The campaign continues until the deadline or until the fundraising goal is reached. Fundraisers can encourage more donations and promote their campaign to maximize their chances of success.</li>
         <li><strong>Use the Funds:</strong> Once the campaign is completed, fundraisers receive the funds raised, which they can use for their intended purpose, whether it's launching a product, supporting a cause, or realizing a creative project.</li>
       </ol>
     </section>
 
     <section>
       <h2>Why Choose Our Crowdfunding Platform?</h2>
       <p>There are several reasons why our crowdfunding platform stands out:</p>
       <ul>
         <li><strong>Easy-to-Use:</strong> Our platform offers a user-friendly interface, making it simple for fundraisers to create campaigns and for donors to contribute.</li>
         <li><strong>Secure and Reliable:</strong> We prioritize the security of transactions and personal information, ensuring a safe environment for both fundraisers and donors.</li>
         <li><strong>Wide Reach:</strong> Our platform provides access to a large community of potential donors, increasing the visibility and reach of campaigns.</li>
         <li><strong>Transparent:</strong> We promote transparency by displaying campaign details, progress, and updates, allowing donors to make informed decisions.</li>
         <li><strong>Engagement:</strong> Our platform encourages interaction between fundraisers and donors through comments, updates, and rewards, fostering a sense of community and involvement.</li>
       </ul>
     </section>
   </main>
    <!-- Footer -->
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