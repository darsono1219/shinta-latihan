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
<!-- Lakukan proses seperti menampilkan pada tabel -->
    <?php
    // masukan konfigurasi koneksi database

    // Ambil ID siswa dari URL

    // buat query select data dari tabel siswa

    // jika row tidak kosong maka tampilkan data kosong pada tabel
    // jika tidak pecah data menggunakan array
    
    ?>
    <table class="table table-bordered">
        <tr>
            <th>ID Siswa</th>
            <td>: </td>
        </tr>
        <tr>
            <th>Nama Siswa</th>
            <td>:</td>
        </tr>
        <tr>
            <th>Kelas</th>
            <td>: </td>
        </tr>
        <tr>
            <th>Jurusan</th>
            <td>: </td>
        </tr>
    </table>

    <a href="tabel.php" class="btn btn-primary">Kembali ke Tabel</a>
</div>
</body>
</html>
