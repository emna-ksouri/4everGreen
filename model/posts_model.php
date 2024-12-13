<?php

class PostModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }


    public function generatePostID() {
        // Get the maximum post ID from the posts table
        $sql = "SELECT MAX(PostID) AS max_id FROM posts";
        $stmt = $this->conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // Set the new post ID to be one more than the maximum ID
        $last_id = $row["max_id"] ?? 0;
        return $last_id + 1;
    }

    public function getAllPosts() {
        // Get all posts from the posts table
        $sql = "SELECT * FROM posts";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addPost($userID, $postText) {
        // Generate a new post ID
        $postID = $this->generatePostID();
        // Insert a new post into the posts table
        $sql = "INSERT INTO posts (PostID, UserID, PostText) VALUES (:postID, :userID, :postText)";
        $stmt = $this->conn->prepare($sql);
        // Bind the values to the prepared statement
        $stmt->bindParam(':postID', $postID);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':postText', $postText);
        // Execute the prepared statement
        return $stmt->execute();
    }
}
?>