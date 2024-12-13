<?php


class AdminModel {

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // method to retrieve all admins from the database
    public function getAllAdmins() {
        $sql = "SELECT * FROM admin";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // method to check if an admin with the given username exists
    public function isAdminExistsByUsername($username) {
        $sql = "SELECT COUNT(*) FROM admin WHERE AdUsername = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
}
?>