<?php
require_once 'config/connexion.php';

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database
    $conn = Connexion::connect();

    // Prepare and execute SQL query to check admin credentials
    $query = "SELECT * FROM admin WHERE AdUsername = :username AND AdPassword = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if admin credentials are valid
    if($admin) {
        // Admin login successful
        session_start();
        $_SESSION['admin_username'] = $admin['AdUsername'];
        $_SESSION['admin_id'] = $admin['AdminID'];
        
        // Return success response
        echo json_encode(['success' => true]);
        exit;
    } else {
        // Admin login failed
        echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
        exit;
    }
}
?>
