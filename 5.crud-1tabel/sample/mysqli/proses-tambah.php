<?php
include 'config.php';

$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

$sql = "INSERT INTO siswa (nama, kelas, jurusan) VALUES ('$nama', '$kelas', '$jurusan')";
$result=$conn->query($sql);

if ($result === TRUE) {
        // echo "Data siswa berhasil ditambahkan!";
        header("Location: tabel.php");
        exit();
} else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
