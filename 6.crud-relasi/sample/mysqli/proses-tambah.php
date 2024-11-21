<?php
// Masukkan konfigurasi koneksi database
include 'config.php';

// Deklarasi & inisialisasi
$nama_guru = $_POST['nama_guru'];
$alamat = $_POST['alamat'];
$nama_mapel = $_POST['nama_mapel'];
$semester=$_POST['semester'];

//Deskripsi
// Query untuk tabel guru
$sql_tbl1 = "INSERT INTO guru (nama_guru, alamat) VALUES ('$nama_guru', '$alamat')";
$result1 = $conn->query($sql_tbl1);

// Lakukan pengecekan untuk query pertama
if ($result1 === TRUE) {
        // Ambil ID guru yang baru dimasukkan
        $id_guru = $conn->insert_id;

        // Query untuk tabel mapel
        $sql_tbl2 = "INSERT INTO mapel (nama_mapel,semester,id_guru) VALUES ('$nama_mapel','$semester','$id_guru')";
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