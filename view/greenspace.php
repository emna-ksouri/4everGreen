<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>4evergreen platform</title> 
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/greenspace.css">
</head>

<body>
    <header>
        <img class="logo" src="images/logo.png"  alt="logo">
        <nav class="navigation">
            <a href="community.php">community</a>
            <div class="dropdown">
              <a href="#" onclick="dropdown()" class="drop">green space</a>
              <div id="myDropdown" class="dropdown-content">
                <a href="greenspace-createandjoin.php">create or join greenspace</a>
                <a href="#">your greenspace</a>
              </div>
            </div>
            <a onclick="" href="">sign out</a>
        </nav>
    </header>

    <div class="container">
        <div class="details">
            <h2>Green Space Details</h2>
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th>Greenspace Code</th>
                        <th>Name of Greenspace</th>
                        <th>Description of Greenspace</th>
                        <th>Plants</th>
                    </tr>
                </thead>
                <tbody id="greenSpaceDetails">
                    <!-- Data will be dynamically added here -->
                </tbody>
            </table>
        </div>
        
        <div class="tasks">
            <h2>Tasks</h2>
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Completed</th>
                    </tr>
                </thead>
                <tbody id="tasksList">
                    <!-- Data will be dynamically added here -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

<footer class="site-footer">
    <div class="top-footer">
        <p>Follow Us :</p>
        <a href="https://instagram.com" class="af"><img src="Images/instagram.png" alt="Instagram" class="social-icon"></a>
        <a href="https://facebook.com" class="af"><img src="Images//facebook.png" alt="Facebook" class="social-icon"></a>
        <a href="https://twitter.com" class="af"><img src="Images/twitter.png" alt="Pinterest" class="social-icon"></a>
    </div>
    <br />
    <br />
    <div class="legal-info">
        &copy; 2024  4EVERGREEN |  
        <strong>Directed By :assil rajab -- emna ksouri</strong>
    </div>
</footer>
</html>