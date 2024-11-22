<?php
// Masukkan konfigurasi koneksi database
include 'config.php';

try {
    // Mulai transaksi
    $conn->beginTransaction();

    // Deklarasi & inisialisasi
    $id_guru = $_POST['id_guru']; // ID guru yang akan diedit
    $nama_guru = $_POST['nama_guru'];
    $alamat = $_POST['alamat'];
    $nama_mapel = $_POST['nama_mapel'];
    $semester = $_POST['semester'];

    // Update data di tabel guru
    $sql_tbl1 = "UPDATE guru SET nama_guru = :nama_guru, alamat = :alamat WHERE id_guru = :id_guru";
    $stmt1 = $conn->prepare($sql_tbl1);
    $stmt1->bindParam(':nama_guru', $nama_guru);
    $stmt1->bindParam(':alamat', $alamat);
    $stmt1->bindParam(':id_guru', $id_guru);
    $stmt1->execute();

    // Update data di tabel mapel
    $sql_tbl2 = "UPDATE mapel SET nama_mapel = :nama_mapel, semester = :semester WHERE id_guru = :id_guru";
    $stmt2 = $conn->prepare($sql_tbl2);
    $stmt2->bindParam(':nama_mapel', $nama_mapel);
    $stmt2->bindParam(':semester', $semester);
    $stmt2->bindParam(':id_guru', $id_guru);
    $stmt2->execute();

    // Commit transaksi
    $conn->commit();

    // Redirect jika berhasil
    header("Location: tabel.php");
    exit();
} catch (PDOException $e) {
    // Rollback transaksi jika terjadi kesalahan
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
