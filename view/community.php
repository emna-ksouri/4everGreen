<?php
require_once 'controller/community_controller.php';

// Create an instance of the PostController
$postController = new PostController();

// Fetch all existing posts
$posts = $postController->getAllPosts();

// Handle post submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['text']) && isset($_POST['author'])) {
    $author = $_POST['author'];
    $text = $_POST['text'];

    // Add the post to the database
    $postController->addPost($author, $text);

    // Redirect to prevent form resubmission
    header("Location: community.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>4evergreen platform</title> 
  <link rel="stylesheet" href="css/community.css">
</head>

<body>
    <header>
        <img class="logo" src="images/logo.png"  alt="logo">
        <nav class="navigation">
            <a href="#">community</a>
            <div class="dropdown">
              <a href="#" onclick="dropdown()" class="drop">green space</a>
              <div id="myDropdown" class="dropdown-content">
                <a href="greenspace-createandjoin.php">create or join greenspace</a>
                <a href="greenspace.php">your greenspace</a>
              </div>
            </div>
            <a onclick="" href="">sign out</a>
        </nav>
    </header>
<br><br><br><br><br><br><br><br>
    
<div id="comment-section">
  <!-- Post Form -->
  <form id="post-form" action="" method="post">
      <textarea id="post-textarea" name="text" placeholder="Write your comment here..."></textarea>
      <input type="text" name="author" placeholder="Your Name">
      <button id="post-button" type="submit">Post</button>
  </form>

  <!-- Post List -->
  <ul id="post-list">
      <?php foreach ($posts as $post) { ?>
          <li>
              <span id="post-author"><?php echo $post['author']; ?></span>
              <span id="post-text"><?php echo $post['text']; ?></span>
              <button id="post-comment-button">Comment</button>
          </li>
      <?php } ?>
  </ul>
</div>
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
