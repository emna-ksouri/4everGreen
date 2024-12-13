<?php

class Greenspace {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }


    // Function to insert a greenspace into the database
    public function insertGreenspace($name, $description, $creatorID) {
        // Insert query for the greenspace
        $sql_insert_greenspace = "INSERT INTO greenspace (Name, Description, CreatorID) 
                                  VALUES ('$name', '$description', '$creatorID')";

        // Execute the insert query
        if ($this->conn->query($sql_insert_greenspace) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Function to check if a greenspace already exists in the database
    public function greenspaceExists($greenspaceID) {
        // Query to check if the greenspace exists
        $sql_check_greenspace = "SELECT * FROM greenspace WHERE GreenspaceID = '$greenspaceID'";
        $result = $this->conn->query($sql_check_greenspace);
        return $result->rowCount() > 0;
    }

    // Function to retrieve all greenspaces
    public function getAllGreenspaces() {
        // Query to retrieve all greenspaces
        $sql = "SELECT * FROM greenspace";
        $result = $this->conn->query($sql);
        if ($result->rowCount() > 0) {
            $greenspaces = $result->fetchAll(PDO::FETCH_ASSOC);
        }
        return $greenspaces;
    }

    // Function to delete a greenspace
    public function deleteGreenspace($greenspaceID) {
        // Delete query for the greenspace
        $sql = "DELETE FROM greenspace WHERE GreenspaceID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $greenspaceID);

        // Execute the delete query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Function to update a greenspace
    public function updateGreenspace($greenspaceID, $name, $description, $creatorID) {
        // Update query for the greenspace
        $sql = "UPDATE greenspace SET Name = :name, Description = :description, CreatorID = :creatorID 
                WHERE GreenspaceID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $greenspaceID);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':creatorID', $creatorID);

        // Execute the update query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Function to retrieve a single greenspace by ID
    public function getGreenspaceByID($greenspaceID) {
        // Query to retrieve a single greenspace by ID
        $sql = "SELECT * FROM greenspace WHERE GreenspaceID = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $greenspaceID);
        $stmt->execute();

        // Return the greenspace if it exists, otherwise return null
        if ($stmt->rowCount() > 0) {
            $greenspace = $stmt->fetch(PDO::FETCH_ASSOC);
            return $greenspace;
        } else {
            return null;
        }
    }

    // Function to close the database connection
    public function closeConnection() {
        $this->conn = null;
    }
}
?>