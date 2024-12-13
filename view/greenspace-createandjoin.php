<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>4evergreen platform</title> 
  <link rel="stylesheet" href="css/greenspace-createandjoin.css">
</head>

<body>
    <header>
        <img class="logo" src="images/logo.png"  alt="logo">
        <nav class="navigation">
            <a href="community.php">community</a>
            <div class="dropdown">
              <a href="#" onclick="dropdown()" class="drop">green space</a>
              <div id="myDropdown" class="dropdown-content">
                <a href="#">create or join greenspace</a>
                <a href="greenspace.php">your greenspace</a>
              </div>
            </div>
            <a onclick="" href="">sign out</a>
        </nav>
    </header>
    
    <div class="container">
      <div class="half">
        <h2>Join Green Space</h2>
        <input type="text" id="accessCode" placeholder="Enter code...">
        <button id="accessButton">Access</button>
        <p id="accessMessage" style="display: none;">Incorrect code. Please try again.</p>
      </div>
      <div class="half">
        <h2>Create Green Space</h2>
        <input type="text" id="spaceName" placeholder="Green Space Name">
      <textarea id="spaceDescription" placeholder="Green Space Description"></textarea>
        <label for="numPlants">Number of Plants:</label>
        <select id="numPlants">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <!-- Add more options as needed -->
        </select>
        <div id="plantDetails">
          <!-- Plant details inputs will be added dynamically here -->
        </div>
        <button id="createButton">Create</button>
      </div>
    </div>
    <script src="js/script.js"></script>
  </body>
  <footer class="site-footer">
    <div class="top-footer">
      <p>Follow Us!:</p>
      <a href="https://instagram.com" class="af"><img src="../Image/Home-pics-vid/instagram.jpg" alt="Instagram"
          class="social-icon"></a>
      <a href="https://facebook.com" class="af"><img src="../Image/Home-pics-vid/facebook.jpg" alt="Facebook"
          class="social-icon"></a>
      <a href="https://pinterest.com" class="af"><img src="../Image/Home-pics-vid/pinterest.jpg" alt="Pinterest"
          class="social-icon"></a>
    </div>
    <br />
    <br />
      <div class="legal-info">
        &copy; 2024  4EVERGREEN |<em>Directed By <strong>: </strong>assil rajab <strong>--</strong> emna ksouri</em>
      </div>
    </div>
  </footer>
  </html>