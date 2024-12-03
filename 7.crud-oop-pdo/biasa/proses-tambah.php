<?php
include 'ConfigDatabase.php';
include 'Siswa.php';

$database = new ConfigDatabase();
$db = $database->getConnection();

$guru = new Siswa($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    if ($guru->create($nama, $kelas, $jurusan)) {
        header("Location: tabel.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    }
}
?>
