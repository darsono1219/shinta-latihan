<!DOCTYPE html>
<html>
<head>
    <title>Detail Data Siswa</title>
    <!-- Load file CSS Bootstrap offline -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2>Detail Data Siswa</h2>

    <?php
    // masukkan konfigurasi koneksi database
    include 'config.php';

    // Ambil ID siswa dari URL
    $id = $_GET['id'];

    try {
        // buat query select data dari tabel siswa dengan prepared statement
        $query = "SELECT * FROM siswa WHERE id = :id";
        $stmt = $conn->prepare($query);

        // Bind parameter :id ke variabel $id
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Eksekusi query
        $stmt->execute();

        // Ambil hasil query
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // jika data tidak ditemukan
        if (!$row) {
            echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
    ?>

    <table class="table table-bordered">
        <tr>
            <th>ID Siswa</th>
            <td>: <?= $row['id'] ?></td>
        </tr>
        <tr>
            <th>Nama Siswa</th>
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
