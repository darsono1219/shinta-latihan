<?php
include 'ConfigDatabase.php';
include 'Siswa.php';

$database = new ConfigDatabase();
$db = $database->getConnection();

$guru = new Siswa($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kelas= $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    if ($guru->update($id, $nama, $kelas, $jurusan)) {
        header("Location: tabel.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat memperbarui data.";
    }
}
?>