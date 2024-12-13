<?php

include_once("../config/connexion.php"); 
include_once("../model/User_model.php"); 




class IndexController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // Method to handle sign-up form submission
    public function signUp() {
        // Perform server-side validation
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newUsername = $_POST['new-username'];
            $email = $_POST['email'];
            $newPassword = $_POST['new-password'];
            $verifyPassword = $_POST['verify-password'];

            // Check if fields are empty
            if (empty($newUsername) || empty($email) || empty($newPassword) || empty($verifyPassword)) {
                // Handle empty fields error
                $errorMessage = "All fields are required.";
                require_once 'index.php';
                return;
            }

            // Check if passwords match
            if ($newPassword != $verifyPassword) {
                // Handle passwords not matching error
                $errorMessage = "Passwords do not match.";
                require_once 'index.php';
                return;
            }

            // You can add more server-side validation here

            // If all validation passes, proceed to sign up the user
            $result = $this->userModel->addUser($newUsername, $email, $newPassword);

            if ($result) {
                // User signed up successfully
                // Redirect to the community page
                header("Location: ../view/community.php");
                exit;
            } else {
                // Handle sign-up failure
                $errorMessage = "Failed to sign up. Please try again.";
                require_once 'index.php';
                return;
            }
        }
    }

    // Method to handle sign-in form submission
    public function signIn() {
        // Perform server-side validation
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Check if fields are empty
            if (empty($username) || empty($password)) {
                // Handle empty fields error
                $errorMessage = "Username and password are required.";
                require_once 'index.php';
                return;
            }

            // Validate user credentials
            $user = $this->userModel->getUserByUsername($username);

            if (!$user || !password_verify($password, $user['Password'])) {
                // Handle invalid credentials error
                $errorMessage = "Invalid username or password.";
                require_once 'index.php';
                return;
            }
            else {
            // If credentials are valid, you can proceed to authenticate the user
            // For example, set session variables and redirect to the community page
             $_SESSION['user_id'] = $user['UserID'];
             $_SESSION['username'] = $user['Username'];
             header("Location: ../view/community.php");
             exit;}
        }
    }
}