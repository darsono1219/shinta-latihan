<?php
// Masukkan konfigurasi koneksi database
include 'config.php';

try {
    // Mulai transaksi
    //untuk memastikan integritas data antara tabel guru dan mapel
    $conn->beginTransaction();

    // Deklarasi & inisialisasi
    $nama_guru = $_POST['nama_guru'];
    $alamat = $_POST['alamat'];
    $nama_mapel = $_POST['nama_mapel'];
    $semester = $_POST['semester'];

    // Query untuk tabel guru
    $sql_tbl1 = "INSERT INTO guru (nama_guru, alamat) VALUES (:nama_guru, :alamat)";
    $stmt1 = $conn->prepare($sql_tbl1);
    $stmt1->bindParam(':nama_guru', $nama_guru);
    $stmt1->bindParam(':alamat', $alamat);
    $stmt1->execute();

    // Ambil ID guru yang baru dimasukkan
    $id_guru = $conn->lastInsertId();

    // Query untuk tabel mapel
    $sql_tbl2 = "INSERT INTO mapel (nama_mapel, semester, id_guru) VALUES (:nama_mapel, :semester, :id_guru)";
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
