<?php

class PlantsTaskModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }


    public function generateTaskID() {
        // Get the maximum task ID from the plantstasks table
        $sql = "SELECT MAX(TaskID) AS max_id FROM plantstasks";
        $stmt = $this->conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // Set the new task ID to be one more than the maximum ID
        $last_id = $row["max_id"] ?? 0;
        return $last_id + 1;
    }

    public function getAllPlantsTasks() {
        // Get all plant tasks from the plantstasks table
        $sql = "SELECT * FROM plantstasks";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addPlantTask($greenspaceID, $taskName, $plantID, $description, $dueDate, $completed) {
        // Generate a new task ID
        $taskID = $this->generateTaskID();
        // Insert a new plant task into the plantstasks table
        $sql = "INSERT INTO plantstasks (TaskID, GreenspaceID, TaskName, PlantID, Description, DueDate, Completed) VALUES (:taskID, :greenspaceID, :taskName, :plantID, :description, :dueDate, :completed)";
        $stmt = $this->conn->prepare($sql);
        // Bind the values to the prepared statement
        $stmt->bindParam(':taskID', $taskID);
        $stmt->bindParam(':greenspaceID', $greenspaceID);
        $stmt->bindParam(':taskName', $taskName);
        $stmt->bindParam(':plantID', $plantID);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':dueDate', $dueDate);
        $stmt->bindParam(':completed', $completed);
        // Execute the prepared statement
        return $stmt->execute();
    }
}
?>