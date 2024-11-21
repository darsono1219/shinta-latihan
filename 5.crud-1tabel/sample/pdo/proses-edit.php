<?php
// masukkan konfigurasi koneksi database
include 'config.php';

// deklarasi & inisialisasi
// dapatkan data dari form input
$id = $_POST['id'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

try {
    // buat query update data berdasarkan ID yang dipilih
    $sql = "UPDATE siswa SET nama = :nama, kelas = :kelas, jurusan = :jurusan WHERE id = :id";

    // Menyiapkan query dengan PDO
    $stmt = $conn->prepare($sql);

    // Bind parameter ke variabel
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':kelas', $kelas);
    $stmt->bindParam(':jurusan', $jurusan);
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
