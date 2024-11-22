<?php
// Masukkan konfigurasi koneksi database
include 'config.php';

try {
    // Mulai transaksi
    $conn->beginTransaction();

    // Deklarasi & inisialisasi
    $id_guru = $_GET['id_guru']; // ID guru yang akan dihapus

    // Hapus data di tabel mapel terlebih dahulu (tabel terkait yang ada relasi)
    $sql_tbl2 = "DELETE FROM mapel WHERE id_guru = :id_guru";
    $stmt2 = $conn->prepare($sql_tbl2);
    $stmt2->bindParam(':id_guru', $id_guru);
    $stmt2->execute();

    // Hapus data di tabel guru (tabel utama)
    $sql_tbl1 = "DELETE FROM guru WHERE id_guru = :id_guru";
    $stmt1 = $conn->prepare($sql_tbl1);
    $stmt1->bindParam(':id_guru', $id_guru);
    $stmt1->execute();

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
