<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data Siswa</title>
    <!-- Load file CSS Bootstrap offline -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2>Ubah Data Siswa</h2>

    <?php
        // masukan konfigurasi koneksi database
        include 'config.php';

        // deklarasi & inisialisasi
        // ambil id dari url link
        $id = $_GET['id'];
        $query = "SELECT * FROM siswa WHERE id = $id";
        $result = $conn->query($query);

        // lakukan pengecekan data ada, jika ada maka pecah menjadi array
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
    ?>

    <form action="proses-edit.php" method="POST">
        <div class="form-group">
            <label>ID:</label>
            <input type="text" name="id" class="form-control" value="<?= $row['id'] ?>"/>
        </div>
        <!-- <input type="hidden" name="id" value="<?= $row['id'] ?>"/> -->
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($row['nama']) ?>"/>
        </div>

        <div class="form-group">
            <label>Kelas:</label>
            <input type="text" name="kelas" class="form-control" value="<?= htmlspecialchars($row['kelas']) ?>"/>
        </div>

        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" value="<?= htmlspecialchars($row['jurusan']) ?>"/>
        </div><br>

        <div class="form-group">
            <a href="tabel.php" class="btn btn-primary">Kembali</a>
            <button type="submit" class="btn btn-success">Ubah</button>
        </div>
    </form>
</div>
</body>
</html>
