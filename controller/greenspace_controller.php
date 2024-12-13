<?php

include_once("../config/connexionbd.php"); 
include_once("../model/greenspace_model.php"); 
include_once("../model/greenspace_model.php"); 

class GreenspaceModel {
    private $conn;

    public function __construct() {
        $this->conn = Connexion::connect();
    }

    public function getGreenspaceDetails() {
        // Fetch Greenspace details from the database
        $query = "SELECT * FROM greenspace";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $greenspaceDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Example data if database is not available
        if (empty($greenspaceDetails)) {
            $greenspaceDetails = [
                [
                    'code' => 'GS001',
                    'name' => 'Example Greenspace',
                    'description' => 'A beautiful greenspace for relaxation',
                    'plants' => ['Plant 1', 'Plant 2']
                ]
            ];
        }

        return $greenspaceDetails;
    }

    public function getTasks() {
        // Fetch tasks associated with the Greenspace from the database
        $query = "SELECT * FROM tasks";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Example data if database is not available
        if (empty($tasks)) {
            $tasks = [
                [
                    'name' => 'Watering',
                    'description' => 'Water the plants in the greenspace',
                    'dueDate' => '2024-05-15',
                    'completed' => 'No'
                ]
            ];
        }

        return $tasks;
    }
}
?>