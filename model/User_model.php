<?php

class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }



    //generate a new user ID
    public function generateUserId() {
        // Query to get the maximum user ID from the database
        $sql = "SELECT MAX(UserID) AS max_id FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $maxId = $row['max_id'] ?? 0;
        // Return the maximum ID plus one
        return $maxId + 1;
    }
    
    // Method to add a user to the database
public function addUser($username, $email, $password) {
    // Generate a new user ID
    $userId = $this->generateUserId();
    // Insert query for the user
    $sql_insert_user = "INSERT INTO users (UserID, Username, Email, Password) VALUES (:userId, :username, :email, :password)";
    $stmt = $this->conn->prepare($sql_insert_user);
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', password_hash($password, PASSWORD_BCRYPT)); // Hash the password
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
    // Method to check if a user already exists in the database
    public function userExistsByEmail($email) {
        // Query to check if the user exists
        $sql_check_user = "SELECT * FROM users WHERE Email = :email";
        $stmt = $this->conn->prepare($sql_check_user);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function getAllUsers() {
        // Query to retrieve all users
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $users;
    }

    public function deleteUser($userId) {
        // Query to delete the user
        $sql = "DELETE FROM users WHERE UserID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $userId);
        // Execute the delete query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserById($userId) {
        // Prepare the SQL query to retrieve the user by ID
        $sql = "SELECT * FROM users WHERE UserID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $userId);
        
        // Execute the query
        $stmt->execute();
        
        // Check if there are any results
        if ($stmt->rowCount() > 0) {
            // Retrieve the corresponding user
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } else {
            // No user found for the specified ID
            return null;
        }
    }
    
    // Method to close the database connection
    public function closeConnection() {
        $this->conn->close();
    }
}