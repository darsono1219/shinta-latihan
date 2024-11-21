<?php
// masukkan konfigurasi koneksi database
include 'config.php';

// deklarasi & inisialisasi
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

try {
    // Deskripsi
    // Buat query insert data
    $sql = "INSERT INTO siswa (nama, kelas, jurusan) VALUES (:nama, :kelas, :jurusan)";

    // Menyiapkan query dengan PDO
    $stmt = $conn->prepare($sql);

    // Bind parameter ke variabel
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':kelas', $kelas);
    $stmt->bindParam(':jurusan', $jurusan);

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
