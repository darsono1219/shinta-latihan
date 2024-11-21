<?php
// masukan konfigurasi koneksi database
include 'config.php';

// deklarasi & inisialisasi
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

// deskripsi
// buat query insert data
$sql = "INSERT INTO siswa (nama, kelas, jurusan) VALUES ('$nama', '$kelas', '$jurusan')";
$result=$conn->query($sql);

// lakukan pengecekan jika hasilnya benar maka masukan ke tabel jika salah tampilkan errornya
if ($result === TRUE) {
        header("Location: tabel.php");
        exit();
} else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}
// putuskan koneksi dengan database
$conn->close();
?>
