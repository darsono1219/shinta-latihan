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
    // Masukkan konfigurasi koneksi database
    include 'config.php';

    // Ambil ID guru dari URL
    $id_guru = $_GET['id_guru'];

    try {
        // Buat query menggunakan prepared statement
        $query = "SELECT * FROM guru JOIN mapel ON guru.id_guru = mapel.id_guru WHERE guru.id_guru = :id_guru";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_guru', $id_guru, PDO::PARAM_INT);
        $stmt->execute();

        // Periksa apakah data ditemukan
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
            exit;
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Terjadi kesalahan: " . htmlspecialchars($e->getMessage()) . "</div>";
        exit;
    }
    ?>

    <table class="table table-bordered">
        <tr>
            <th>ID Guru</th>
            <td>: <?= $row['id_guru'] ?></td>
        </tr>
        <tr>
            <th>Nama Guru</th>
            <td>: <?= $row['nama_guru'] ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>: <?= $row['alamat'] ?></td>
        </tr>
        <tr>
            <th>Mata Pelajaran</th>
            <td>: <?= $row['nama_mapel'] ?></td>
        </tr>
        <tr>
            <th>Semester</th>
            <td>: <?= $row['semester'] ?></td>
        </tr>
    </table>

    <a href="tabel.php" class="btn btn-primary">Kembali ke Tabel</a>
</div>
</body>
</html>
