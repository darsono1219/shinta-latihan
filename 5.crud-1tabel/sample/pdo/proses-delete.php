<?php
// masukkan konfigurasi koneksi database
include 'config.php';

// deklarasi & deskripsi
// ambil data dari url link
$id = $_GET['id'];

try {
    // buat query hapus data berdasarkan id yang didapatkan
    $sql = "DELETE FROM siswa WHERE id = :id";

    // Menyiapkan query dengan PDO
    $stmt = $conn->prepare($sql);

    // Bind parameter ke variabel
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Eksekusi query
    $stmt->execute();

    // Redirect jika berhasil
    header("Location: tabel.php");
    exit();
} catch (PDOException $e) {
    // Tampilkan error jika terjadi masalah
    echo "Error: " . $e->getMessage();
}

// Putuskan koneksi dengan database
$conn = null;
?>
