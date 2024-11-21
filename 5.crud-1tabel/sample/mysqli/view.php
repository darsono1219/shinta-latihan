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
    // masukan konfigurasi koneksi database
    include 'config.php';

    // Ambil ID siswa dari URL
    $id = $_GET['id'];

    // buat query select data dari tabel siswa
    $query = "SELECT * FROM siswa WHERE";
    $result = $conn->query($query);

    // jika row tidak kosong maka tampilkan data kosong pada tabel
    // jika tidak pecah data menggunakan array
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Ambil data siswa berdasarkan ID
    } else {
        echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
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
            <td>: <?=$row['jurusan']?></td>
        </tr>
    </table>

    <a href="tabel.php" class="btn btn-primary">Kembali ke Tabel</a>
</div>
</body>
</html>
