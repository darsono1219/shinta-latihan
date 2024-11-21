<?php
// masukan konfigurasi koneksi database
include 'config.php';

// deklarasi & inisialisasi
// dapatkan data dari form input
$id = $_POST['id'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

// buat query update data berdasarkan ID yang dipilih
$sql = "UPDATE siswa SET nama='$nama', kelas='$kelas', jurusan='$jurusan' WHERE id=$id";
$result = $conn->query($sql);

// lakukan pengecekan berhasil update, jika berhasil tampilkan ke halaman tabel dan tampilkan error jika terjadi error
if ($result === TRUE) {
    header("Location: tabel.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Putuskan koneksi
$conn->close();

?>