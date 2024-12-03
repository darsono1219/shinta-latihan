

<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data GURU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Ubah Data GURU</h2>
    <?php
    include 'ConfigDatabase.php';
    include 'Siswa.php';

    $database = new ConfigDatabase();
    $db = $database->getConnection();

    $guru = new Siswa($db);

    // Ambil ID guru dari URL
    $id = $_GET['id'];

    // Ambil data guru dan mapel berdasarkan ID
    $data = $guru->readById($id);

    if (!$data) {
        echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
        exit;
    }
    ?>
    <form action="proses-edit.php" method="POST">
        <div class="form-group">
            <input type="text" name="id" class="form-control" value="<?= $data['id'] ?>" readonly />
        </div>
        <div class="form-group">
            <label>Nama :</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" />
        </div>
        <div class="form-group">
            <label>Kelas :</label>
            <input type="text" name="kelas" class="form-control" value="<?= $data['kelas'] ?>" />
        </div>
        <div class="form-group">
            <label>Jurusan :</label>
            <input type="text" name="jurusan" class="form-control" value="<?= $data['jurusan'] ?>" />
        </div><br>
        <div class="form-group">
            <a href="tabel.php" class="btn btn-primary">Kembali</a>
            <button type="submit" class="btn btn-success">Ubah</button>
        </div>
    </form>
</div>
</body>
</html>
