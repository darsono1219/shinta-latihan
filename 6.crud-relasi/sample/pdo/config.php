<?php
// Konfigurasi database
$host = 'localhost'; // Nama host atau alamat IP database server
$dbname = 'latihan'; // Nama database
$dbuser = 'root';    // Username untuk koneksi database
$dbpass = '';        // Password untuk koneksi database

try {
    // Membuat koneksi ke database menggunakan PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    // Set atribut PDO untuk menampilkan error jika terjadi masalah
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Tampilkan pesan kesalahan jika koneksi gagal
    die("Koneksi gagal: " . $e->getMessage());
}
?>
