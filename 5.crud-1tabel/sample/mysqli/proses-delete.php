<?php
    // masukan konfigurasi koneksi database
    include 'config.php';

    // deklarasi & deskripsi
    // ambil data dari url link
    $id = $_GET['id'];

    // buat query hapus data berdasarkan id yang didapatkan
    $sql = "DELETE FROM siswa WHERE id=$id";
    $result=$conn->query($sql);

    // lakukan pengecekan berhasil hapus, jika berhasil tampilkan ke halaman tabel dan tampilkan error jika terjadi error
    if ( $result === TRUE) {
        header("Location: tabel.php");
    } else {
        echo "Error: " . $conn->error;
    }
// Putuskan koneksi
$conn->close();
?>