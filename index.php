<?php
// Code before user login

// Check if the user is already logged in
session_start();
if (isset($_SESSION['rg'])) {
  // Redirect the user to the logged-in version of index.php
  header("Location: index_logged_in.php");
  exit();
}
?>
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
            <li><a href="index.html">Home</a></li>
            <li><a href="campaigns.html">Campaigns</a></li>
            <li><a href="create_campaign.html">Start a Campaign</a></li>
            <li><a href="benefits.html">Benefits</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact us</a></li>
            <?php if (isset($_SESSION['username'])) : ?>
                <li class="navbar-profile">
                    <a href="#"><i class="fas fa-user"></i> <?php echo $firstName . ' ' . $lastName; ?></a>
                    <ul class="navbar-dropdown">
                        <li><a href="profile.html"><i class="fas fa-user"></i> Profile</a></li>
                        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
                    </ul>
                </li>
            <?php else : ?>
                <li class="navbar-btns">
                    <a href="login/login.php" class="btn-login">Login To Your Fundraiser</a>
                    <a href="signup/signup.php" class="btn-signup">Sign Up</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <!-- Main content -->
    <main>
        <div align="center">
            <h1 textsize="big">A Little Help Can Change the World</h1>
            <h2>Start a Fundraiser</h2>
        </div>
        <div>
            <h2>What to expect</h2>
            <div>
                <h1>Fundraising on GoFundMe<br>takes just a few minutes</h1>
                <div class="key-points">
                    <div class="point">
                        <h3>Step 1</h3>
                        <p><b>Start with the basics</b><br> Kick things off with your name and location.</p>
                    </div>
                    <div class="point">
                        <h3>Step 2</h3>
                        <p><b>Tell your story</b><br> We'll guide you with tips along the way.</p>
                    </div>
                    <div class="point">
                        <h3>Step 3</h3>
                        <p><b>Share with friends and family</b><br> People out there want to help you.</p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2>Where you can help</h2>
            <div>
                <h1>Trending Campaigns</h1>
                <div class="catalog-container">
                    <div class="catalog">
                        <div class="card">
                            <img src="https://via.placeholder.com/300x250.png" alt="Product Image">
                            <h2>Product Title</h2>
                            <p>Description of the product goes here.</p>
                            <button>Buy Now</button>
                        </div>
                        <div class="card">
                            <img src="https://via.placeholder.com/300x250.png" alt="Product Image">
                            <h2>Product Title</h2>
                            <p>Description of the product goes here.</p>
                            <button>Buy Now</button>
                        </div>
                        <div class="card">
                            <img src="https://via.placeholder.com/300x250.png" alt="Product Image">
                            <h2>Product Title</h2>
                            <p>Description of the product goes here.</p>
                            <button>Buy Now</button>
                        </div>
                        <div class="card">
                            <img src="https://via.placeholder.com/300x250.png" alt="Product Image">
                            <h2>Product Title</h2>
                            <p>Description of the product goes here.</p>
                            <button>Buy Now</button>
                        </div>
                        <div class="card">
                            <img src="https://via.placeholder.com/300x250.png" alt="Product Image">
                            <h2>Product Title</h2>
                            <p>Description of the product goes here.</p>
                            <button>Buy Now</button>
                        </div>
                        <!-- Add more cards here -->
                    </div>
                </div>
            </div>
        </div>
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