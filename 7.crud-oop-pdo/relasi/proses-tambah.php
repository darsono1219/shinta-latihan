<?php
include 'ConfigDatabase.php';
include 'GuruTransaktion.php';

$database = new ConfigDatabase();
$db = $database->getConnection();

$guru = new GuruTransaktion($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_guru = $_POST['nama_guru'];
    $alamat = $_POST['alamat'];
    $nama_mapel = $_POST['nama_mapel'];
    $semester = $_POST['semester'];

    if ($guru->create($nama_guru, $alamat, $nama_mapel, $semester)) {
        header("Location: tabel.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    }
}
?>