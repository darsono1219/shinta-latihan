<?php
class Siswa {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create - Tambah data siswa
    public function create($nama, $kelas, $jurusan) {
        try {
            $query = "INSERT INTO siswa (nama, kelas, jurusan) VALUES (:nama, :kelas, :jurusan)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':kelas', $kelas);
            $stmt->bindParam(':jurusan', $jurusan);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Read - Ambil semua data siswa
    public function readAll() {
        try {
            $query = "SELECT * FROM siswa";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // Read - Ambil data siswa berdasarkan ID
    public function readById($id) {
        try {
            $query = "SELECT * FROM siswa WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    // Update - Perbarui data siswa
    public function update($id, $nama, $kelas, $jurusan) {
        try {
            $query = "UPDATE siswa SET nama = :nama, kelas = :kelas, jurusan = :jurusan WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':kelas', $kelas);
            $stmt->bindParam(':jurusan', $jurusan);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Delete - Hapus data siswa
    public function delete($id) {
        try {
            $query = "DELETE FROM siswa WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


}
?>

