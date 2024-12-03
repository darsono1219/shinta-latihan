

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
    <?php
    include 'ConfigDatabase.php';
    include 'Siswa.php';

    $database = new ConfigDatabase();
    $db = $database->getConnection();

    $siswa = new Siswa($db);

    // Ambil ID guru dari URL
    $id = $_GET['id'];

    try {
        // Ambil data guru berdasarkan ID
        $row = $siswa->readById($id);

        if (!$row) {
            echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
            exit;
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Terjadi kesalahan: " . $e->getMessage() . "</div>";
        exit;
    }
    ?>
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <td>: <?= $row['nama'] ?></td>
        </tr>
        <tr>
            <th>Kelas</th>
            <td>: <?= $row['kelas'] ?></td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td>: <?= $row['jurusan'] ?></td>
        </tr>
    </table>

    <a href="tabel.php" class="btn btn-primary">Kembali ke Tabel</a>
</div>
</body>
</html>
