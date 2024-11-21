<?php
// Masukkan konfigurasi koneksi database
include 'config.php';

// Deklarasi & inisialisasi
// dapatkan inputan dari formulir
$id_guru = $_POST['id_guru']; // ID guru yang akan diedit
$nama_guru = $_POST['nama_guru'];
$alamat = $_POST['alamat'];
$nama_mapel = $_POST['nama_mapel'];
$semester = $_POST['semester'];

// Update data di tabel guru
$sql_tbl1 = "UPDATE guru SET nama_guru = '$nama_guru', alamat = '$alamat' WHERE id_guru = '$id_guru'";
$result1 = $conn->query($sql_tbl1);

// Lakukan pengecekan untuk query pertama
if ($result1 === TRUE) {
    // Update data di tabel mapel
    $sql_tbl2 = "UPDATE mapel SET nama_mapel = '$nama_mapel', semester = '$semester' WHERE id_guru = '$id_guru'";
    $result2 = $conn->query($sql_tbl2);

    // Pengecekan untuk query kedua
    if ($result2 === TRUE) {
        // Redirect jika berhasil
        header("Location: tabel.php");
        exit();
    } else {
        echo "Error: " . $sql_tbl2 . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql_tbl1 . "<br>" . $conn->error;
}

// Putuskan koneksi dengan database
$conn->close();
?>
