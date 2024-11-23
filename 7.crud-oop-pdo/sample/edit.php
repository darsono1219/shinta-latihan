<?php
include 'ConfigDatabase.php';
include 'GuruTransaktion.php';

$database = new ConfigDatabase();
$db = $database->getConnection();

$guru = new GuruTransaktion($db);

// Ambil ID guru dari URL
$id_guru = $_GET['id_guru'];

// Ambil data guru dan mapel berdasarkan ID
$data = $guru->getDetail($id_guru);

if (!$data) {
    echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data GURU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Ubah Data GURU</h2>
    <form action="proses-edit.php" method="POST">
        <div class="form-group">
            <label>ID Guru:</label>
            <input type="text" name="id_guru" class="form-control" value="<?= htmlspecialchars($data['id_guru']) ?>" readonly />
        </div>
        <div class="form-group">
            <label>Nama Guru:</label>
            <input type="text" name="nama_guru" class="form-control" value="<?= htmlspecialchars($data['nama_guru']) ?>" />
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control"><?= htmlspecialchars($data['alamat']) ?></textarea>
        </div>
        <div class="form-group">
            <label>Nama Mapel:</label>
            <input type="text" name="nama_mapel" class="form-control" value="<?= htmlspecialchars($data['nama_mapel']) ?>" />
        </div>
        <div class="form-group">
            <label>Semester:</label>
            <select name="semester" class="form-control">
                <option value="1" <?= $data['semester'] == 1 ? 'selected' : '' ?>>1</option>
                <option value="2" <?= $data['semester'] == 2 ? 'selected' : '' ?>>2</option>
            </select>
        </div><br>
        <div class="form-group">
            <a href="tabel.php" class="btn btn-primary">Kembali</a>
            <button type="submit" class="btn btn-success">Ubah</button>
        </div>
    </form>
</div>
</body>
</html>
