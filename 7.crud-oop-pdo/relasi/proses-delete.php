<?php
include 'ConfigDatabase.php';
include 'GuruTransaktion.php';

$database = new ConfigDatabase();
$db = $database->getConnection();

$guru = new GuruTransaktion($db);
$id_guru = $_GET['id_guru'];

if ($guru->delete($id_guru)) {
    header("Location: tabel.php");
    exit();
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>