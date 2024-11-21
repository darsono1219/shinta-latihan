<?php
include 'config.php';

$id=$_POST['id'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

$sql = "UPDATE siswa SET nama='$nama', kelas='$kelas', jurusan='$jurusan' WHERE id=$id";
$result = $conn->query($sql);

if ($result === TRUE) {
        // echo "Data siswa berhasil ditambahkan!";
        header("Location: tabel.php");
        exit();
} else {
        echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>