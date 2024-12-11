<?php
class GuruTransaktion {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create
    public function login($username, $password) {
        try {
            $this->conn->beginTransaction();

            $queryMapel = "SELECT * FROM User_session where username=':username' and password=':password'";
            $stmtMapel = $this->conn->prepare($queryMapel);
            $stmtMapel->bindParam(':username', $username);
            $stmtMapel->bindParam(':password', $password);
            $stmtMapel->execute();

            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
