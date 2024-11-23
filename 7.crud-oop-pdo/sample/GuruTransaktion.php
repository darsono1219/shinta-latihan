<?php
class GuruTransaktion {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create
    public function create($nama_guru, $alamat, $nama_mapel, $semester) {
        try {
            $this->conn->beginTransaction();

            // Insert ke tabel guru
            $queryGuru = "INSERT INTO guru (nama_guru, alamat) VALUES (:nama_guru, :alamat)";
            $stmtGuru = $this->conn->prepare($queryGuru);
            $stmtGuru->bindParam(':nama_guru', $nama_guru);
            $stmtGuru->bindParam(':alamat', $alamat);
            $stmtGuru->execute();
            $id_guru = $this->conn->lastInsertId();

            // Insert ke tabel mapel
            $queryMapel = "INSERT INTO mapel (nama_mapel, semester, id_guru) VALUES (:nama_mapel, :semester, :id_guru)";
            $stmtMapel = $this->conn->prepare($queryMapel);
            $stmtMapel->bindParam(':nama_mapel', $nama_mapel);
            $stmtMapel->bindParam(':semester', $semester);
            $stmtMapel->bindParam(':id_guru', $id_guru);
            $stmtMapel->execute();

            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Read
    public function read() {
        $query = "SELECT * FROM guru JOIN mapel ON guru.id_guru = mapel.id_guru";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update
    public function update($id_guru, $nama_guru, $alamat, $nama_mapel, $semester) {
        try {
            $this->conn->beginTransaction();

            // Update tabel guru
            $queryGuru = "UPDATE guru SET nama_guru = :nama_guru, alamat = :alamat WHERE id_guru = :id_guru";
            $stmtGuru = $this->conn->prepare($queryGuru);
            $stmtGuru->bindParam(':nama_guru', $nama_guru);
            $stmtGuru->bindParam(':alamat', $alamat);
            $stmtGuru->bindParam(':id_guru', $id_guru);
            $stmtGuru->execute();

            // Update tabel mapel
            $queryMapel = "UPDATE mapel SET nama_mapel = :nama_mapel, semester = :semester WHERE id_guru = :id_guru";
            $stmtMapel = $this->conn->prepare($queryMapel);
            $stmtMapel->bindParam(':nama_mapel', $nama_mapel);
            $stmtMapel->bindParam(':semester', $semester);
            $stmtMapel->bindParam(':id_guru', $id_guru);
            $stmtMapel->execute();

            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Delete
    public function delete($id_guru) {
        try {
            $this->conn->beginTransaction();

            // Hapus dari tabel mapel
            $queryMapel = "DELETE FROM mapel WHERE id_guru = :id_guru";
            $stmtMapel = $this->conn->prepare($queryMapel);
            $stmtMapel->bindParam(':id_guru', $id_guru);
            $stmtMapel->execute();

            // Hapus dari tabel guru
            $queryGuru = "DELETE FROM guru WHERE id_guru = :id_guru";
            $stmtGuru = $this->conn->prepare($queryGuru);
            $stmtGuru->bindParam(':id_guru', $id_guru);
            $stmtGuru->execute();

            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    //    Detail Guru
    public function getDetail($id_guru) {
        $query = "SELECT * FROM guru 
              JOIN mapel ON guru.id_guru = mapel.id_guru 
              WHERE guru.id_guru = :id_guru";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_guru', $id_guru, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }
}
?>
