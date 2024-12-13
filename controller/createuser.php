<?php

include_once('../config/connexion.php');
include_once('../model/User_model.php');

class UserController {
    private $conn;
    private $userModel;

    public function __construct() {
        $this->conn = Connexion::connect();
        $this->userModel = new UserModel($this->conn);
    }

    public function createUser() {
        // Get data from the form
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // Check if the user already exists
        if ($this->userModel->userExistsByEmail($email)) {
            echo "This email is already taken.";
            return;
        }

        // Generate a new user ID
        $userId = $this->userModel->generateUserId();

        // Insert the user into the database
        if ($this->userModel->addUser($userId, $username, $email, password_hash($password, PASSWORD_BCRYPT))) {
            echo "User created successfully.";
        } else {
            $errorInfo = $this->conn->errorInfo();
            echo "Error creating user: " . $errorInfo[2];
        }
    }
}
?>