<?php

class PlantModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }


    public function generatePlantID() {
        // Get the maximum plant ID from the plants table
        $sql = "SELECT MAX(PlantID) AS max_id FROM plants";
        $stmt = $this->conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // Set the new plant ID to be one more than the maximum ID
        $last_id = $row["max_id"] ?? 0;
        return $last_id + 1;
    }

    public function getAllPlants() {
        // Get all plants from the plants table
        $sql = "SELECT * FROM plants";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addPlant($greenspaceID, $name, $type) {
        // Generate a new plant ID
        $plantID = $this->generatePlantID();
        // Insert a new plant into the plants table
        $sql = "INSERT INTO plants (PlantID, GreenspaceID, Name, Type) VALUES (:plantID, :greenspaceID, :name, :type)";
        $stmt = $this->conn->prepare($sql);
        // Bind the values to the prepared statement
        $stmt->bindParam(':plantID', $plantID);
        $stmt->bindParam(':greenspaceID', $greenspaceID);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':type', $type);
        // Execute the prepared statement
        return $stmt->execute();
    }

    public function isPlantExistsByName($name) {
        // Check if a plant with the given name already exists in the plants table
        $sql = "SELECT COUNT(*) FROM plants WHERE Name = :name";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        // Get the number of rows returned by the query
        $count = $stmt->fetchColumn();
        // Return true if the count is greater than zero, otherwise return false
        return $count > 0;
    }
}
?>