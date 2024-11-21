<?php
// Konfigurasi database
$host = 'localhost';                        // Nama host atau alamat IP database server
$dbname = 'latihan';                  // Nama database
$dbuser = 'root';                           // Username untuk koneksi database
$dbpass = '';                               // Password untuk koneksi database

// Membuat koneksi ke database menggunakan MySQLi
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    echo "Koneksi gagal: ";
 }else{
    echo "koneksi berhasil";
 }
?>
