<?php

class GreenspaceMemberModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }


    public function generateMemberID() {
        $sql = "SELECT COALESCE(MAX(MemberID), 0) + 1 AS new_id FROM greenspacemembers";
        $stmt = $this->conn->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row["new_id"];
    }

    public function getAllGreenspaceMembers() {
        $sql = "SELECT * FROM greenspacemembers";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addGreenspaceMember($userID, $greenspaceID, $role) {
        $memberID = $this->generateMemberID();
        $sql = "INSERT INTO greenspacemembers (MemberID, UserID, GreenspaceID, Role) VALUES (:memberID, :userID, :greenspaceID, :role)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':memberID', $memberID);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':greenspaceID', $greenspaceID);
        $stmt->bindParam(':role', $role);
        try {
            $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error adding greenspace member: ". $e->getMessage());
        }
    }

    public function isMemberExists($userID, $greenspaceID) {
        $sql = "SELECT COUNT(*) FROM greenspacemembers WHERE UserID = :userID AND GreenspaceID = :greenspaceID";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':greenspaceID', $greenspaceID);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
}
?>