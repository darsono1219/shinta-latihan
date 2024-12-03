<?php
include 'ConfigDatabase.php';
include 'Siswa.php';

$database = new ConfigDatabase();
$db = $database->getConnection();

$guru = new Siswa($db);
$id = $_GET['id'];

if ($guru->delete($id)) {
    header("Location: tabel.php");
    exit();
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>