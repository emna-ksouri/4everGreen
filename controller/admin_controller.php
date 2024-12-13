<?php
require_once 'config/connexion.php';

class AdminController {
    private $conn;

    public function __construct() {
        $this->conn = Connexion::connect();
    }

    public function index() {
        $query = "SELECT * FROM admin";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM greenspace";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $greenspaces = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM greenspacemembers";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $greenspacemembers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM interactionpost";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $interactionposts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM plants";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $plants = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM plantstasks";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $plantstasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM posts";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include 'view/admin.php';
    }
}
?>
