<?php
include 'ConfigDatabase.php';
include 'GuruTransaktion.php';

$database = new ConfigDatabase();
$db = $database->getConnection();

$guru = new GuruTransaktion($db);

// Ambil ID guru dari URL
$id_guru = $_GET['id_guru'];

try {
    // Ambil data guru berdasarkan ID
    $row = $guru->getDetail($id_guru);

    if (!$row) {
        echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
        exit;
    }
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Terjadi kesalahan: " . htmlspecialchars($e->getMessage()) . "</div>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Data Guru</title>
    <!-- Load file CSS Bootstrap offline -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2>Detail Data Guru</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID Guru</th>
            <td>: <?= htmlspecialchars($row['id_guru']) ?></td>
        </tr>
        <tr>
            <th>Nama Guru</th>
            <td>: <?= htmlspecialchars($row['nama_guru']) ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>: <?= htmlspecialchars($row['alamat']) ?></td>
        </tr>
        <tr>
            <th>Mata Pelajaran</th>
            <td>: <?= htmlspecialchars($row['nama_mapel']) ?></td>
        </tr>
        <tr>
            <th>Semester</th>
            <td>: <?= htmlspecialchars($row['semester']) ?></td>
        </tr>
    </table>

    <a href="tabel.php" class="btn btn-primary">Kembali ke Tabel</a>
</div>
</body>
</html>
