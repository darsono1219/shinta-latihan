<!DOCTYPE html>
<html>
<head>
    <title>Form Edit Data GURU</title>
    <!-- Load file CSS Bootstrap offline -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h2>Ubah Data GURU</h2>

    <?php
        // masukan konfigurasi koneksi database
        include 'config.php';

        // deklarasi & inisialisasi
        // ambil id dari url link
        $id_guru = $_GET['id_guru'];
        $query = "SELECT * FROM guru JOIN mapel On guru.id_guru=mapel.id_guru Where guru.id_guru='$id_guru'";
        $result = $conn->query($query);

        // lakukan pengecekan data ada, jika ada maka pecah menjadi array
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
    ?>

    <form action="proses-edit.php" method="POST">
        <div class="form-group">
            <label>ID Guru:</label>
            <input type="text" name="id_guru" class="form-control" value="<?= $row['id_guru'] ?>"/>
        </div>
        <!-- <input type="hidden" name="id" value="<?= $row['id'] ?>"/> -->
        <div class="form-group">
            <label>Nama Guru:</label>
            <input type="text" name="nama_guru" class="form-control" value="<?= $row['nama_guru'] ?>"/>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" placeholder="Masukan Alamat"><?= $row['alamat'] ?></textarea>

        </div>
        <div class="form-group">
            <label>Nama Mapel:</label>
            <input type="text" name="nama_mapel" class="form-control" value="<?= $row['nama_mapel'] ?>"/>
        </div>

        <div class="form-group">
            <label>Semester:</label>
            <select name="semester" class="form-control">
                <option value="1" <?= $row['semester'] == 1 ? 'selected' : '' ?>>1</option>
                <option value="2" <?= $row['semester'] == 2 ? 'selected' : '' ?>>2</option>
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
