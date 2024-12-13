<?php

class InteractionPostModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }


    // Generate a new CommentID
    public function generateCommentID() {
        $sql = "SELECT MAX(CommentID) AS max_id FROM interactionpost";
        $stmt = $this->conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $last_id = $row["max_id"]?? 0;
        return $last_id + 1;
    }

    // Get all interaction posts
    public function getAllInteractionPosts() {
        $sql = "SELECT * FROM interactionpost";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add a new interaction post
    public function addInteractionPost($userID, $commentText, $postID) {
        $commentID = $this->generateCommentID();
        $sql = "INSERT INTO interactionpost (CommentID, UserID, CommentText, PostID) VALUES (:commentID, :userID, :commentText, :postID)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':commentID', $commentID);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':commentText', $commentText);
        $stmt->bindParam(':postID', $postID);
        return $stmt->execute();
    }

    // Delete an interaction post
    public function deleteInteractionPost($commentID) {
        $sql = "DELETE FROM interactionpost WHERE CommentID = :commentID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':commentID', $commentID);
        return $stmt->execute();
    }

    // Update an interaction post
    public function updateInteractionPost($commentID, $commentText) {
        $sql = "UPDATE interactionpost SET CommentText = :commentText WHERE CommentID = :commentID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':commentID', $commentID);
        $stmt->bindParam(':commentText', $commentText);
        return $stmt->execute();
    }

    // Get an interaction post by ID
    public function getInteractionPostByID($commentID) {
        $sql = "SELECT * FROM interactionpost WHERE CommentID = :commentID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':commentID', $commentID);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

     // Function to close the database connection
     public function closeConnection() {
        $this->conn = null;
    }
}
?>