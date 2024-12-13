<?php
session_start();
require_once 'controller/index_controller.php';
$IndexController = new IndexController();

// Handle sign-up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signUp'])) {
    $IndexController->signUp();
}

// Handle sign-in form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signIn'])) {
    // Call the signIn method in UserController
    // You need to implement the signIn method in UserController
    // $userController->signIn();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>4evergreen platform</title> 
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <!-- Header -->
    <header>
        
        <img class="logo1" src="images/logo.png"  alt="logo">
        <nav class="navigation">
            <a href="#home">Home</a>
            <a href="#about">About</a>
        </nav>
    </header>

    <section class="home" id="home">
        <!-- Home content -->
        <div class="home-content" >
            <!-- Text content -->
          <div class="home-text">
            <h1>4evergreen</h1>
            <p>Join our community to share, care, discover, and learn about your favorite plants. <br> We are waiting for you.</p>
          </div>

          <!-- Login and sign-up buttons -->
          <div class="login-signin-container">
            <button class="btnsign"  onclick="registreLog()">Login</button>
            <button class="btnsign"  onclick="registreSign()">Sign up</button>
          </div>

          <!-- Form container -->
          <div class="blur" id="blur"></div>
          <div id="form" class="form-container">
            <!-- Close button -->
            <span class="close" id="close-btn" onclick="closeForm()">&times;</span>
    
            <!-- Login Form -->
            <form class="login" id="login" method="post">
                <!-- Username and password inputs -->
                <div class="name">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username">
                </div>
                <div class="password">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </div>
                <button type="submit" class="btn" name="signIn">Login</button>
            </form>
    
            <!-- Sign-up Form -->
            <form class="sign" id="sign" onsubmit="return validateForm()" method="post">
                <!-- New username, email, and password inputs -->
                <div class="name">
                    <label for="new-username">New Username:</label>
                    <input type="text" id="new-username" name="new-username">
                </div>
                <div class="email">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email">
                </div>
                <div class="password">
                    <label for="new-password">New Password:</label>
                    <input type="password" id="new-password" name="new-password">
                </div>
                <div class="password-2">
                    <label for="verify-password">Verify Password:</label>
                    <input type="password" id="verify-password" name="verify-password">
                </div>
                <button type="submit" class="btn" name="signUp">Sign Up</button>
            </form>
        </div>
    </section>

   


    <section class="about" id="about">
        <h2>OUR MISSION</h2>
        <p>Our project is rooted in the belief that green spaces are vital to our well-being and inspire us to care for the environment.<br>
          Join us in cultivating a greener world, one plant at a time.</p>
        <h2>ABOUT US</h2>
        <p>Welcome to our green sanctuary, where plant lovers from around the world gather to cultivate connections 
          and share their passion for all things botanical. Our platform is more than just a website; it's a thriving
          community where you can join or create green spaces to collaborate, share tasks, and engage in lively discussions.<br>
          Explore our blogs section to discover a wealth of plant wisdom, where you can post photos, ask questions, and connect with fellow enthusiasts.<br>
        </p>
    </section>

    <script src="js/script.js"></script>
</body>
<footer class="site-footer">
  <div class="top-footer">
    <p>Follow Us :</p>
    <a href="https://instagram.com" class="af"><img src="Images/instagram.png" alt="Instagram"
        class="social-icon"></a>
    <a href="https://facebook.com" class="af"><img src="Images//facebook.png" alt="Facebook"
        class="social-icon"></a>
    <a href="https://twitter.com" class="af"><img src="Images/twitter.png" alt="Pinterest"
        class="social-icon"></a>
  </div>
  <div class="container">
        <form action="adminLogin_controller.php" method="post" id="adminLoginForm">
            <h2>Admin Login</h2>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
  <br />
  <br />
    <div class="legal-info">
      &copy; 2024  4EVERGREEN |  
      <strong>Directed By :assil rajab -- emna ksouri</strong>
    </div>
</footer>
</html>