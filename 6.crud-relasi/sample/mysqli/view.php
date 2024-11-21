<!DOCTYPE html>
<html>
<head>
    <title>Detail Data Siswa</title>
    <!-- Load file CSS Bootstrap offline -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2>Detail Data GURU</h2>

    <?php
    // masukan konfigurasi koneksi database
    include 'config.php';

    // Ambil ID guru dari URL
    $id_guru = $_GET['id_guru'];

    // buat query select data dari tabel siswa
    $query = "SELECT * FROM guru JOIN mapel On guru.id_guru=mapel.id_guru Where guru.id_guru='$id_guru'";
    $result = $conn->query($query);

    // jika row tidak kosong maka tampilkan data kosong pada tabel
    // jika tidak pecah data menggunakan array
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
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
            <td>: <?=$row['nama_mapel']?></td>
        </tr>
        <tr>
            <th>Semester</th>
            <td>: <?=$row['semester']?></td>
        </tr>
    </table>

    <a href="tabel.php" class="btn btn-primary">Kembali ke Tabel</a>
</div>
</body>
</html>
