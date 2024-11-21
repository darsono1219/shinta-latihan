<?php
// Masukkan konfigurasi koneksi database
include 'config.php';

// Deklarasi & inisialisasi
$id_guru = $_POST['id_guru']; // ID guru yang akan dihapus

// Hapus data di tabel mapel terlebih dahulu (tabel terkait yang ada relasi)
$sql_tbl2 = "DELETE FROM mapel WHERE id_guru = '$id_guru'";
$result2 = $conn->query($sql_tbl2);

// Pengecekan query pertama
if ($result2 === TRUE) {
    // Hapus data di tabel guru (tabel utama)
    $sql_tbl1 = "DELETE FROM guru WHERE id_guru = '$id_guru'";
    $result1 = $conn->query($sql_tbl1);

    // Pengecekan query kedua
    if ($result1 === TRUE) {
        // Redirect jika berhasil
        header("Location: tabel.php");
        exit();
    } else {
        echo "Error: " . $sql_tbl1 . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql_tbl2 . "<br>" . $conn->error;
}

// Putuskan koneksi dengan database
$conn->close();
?>