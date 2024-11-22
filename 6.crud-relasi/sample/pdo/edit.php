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
    // Masukkan konfigurasi koneksi database
    include 'config.php';

    // Deklarasi & inisialisasi
    $id_guru = $_GET['id_guru'];

    try {
        // Query untuk mendapatkan data guru dan mapel
        $query = "SELECT * FROM guru JOIN mapel ON guru.id_guru = mapel.id_guru WHERE guru.id_guru = :id_guru";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_guru', $id_guru, PDO::PARAM_INT);
        $stmt->execute();

        // Pengecekan jika data ditemukan
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        exit();
    }
    ?>

    <form action="proses-edit.php" method="POST">
        <div class="form-group">
            <label>ID Guru:</label>
            <input type="text" name="id_guru" class="form-control" value="<?= htmlspecialchars($row['id_guru']) ?>" readonly/>
        </div>
        <div class="form-group">
            <label>Nama Guru:</label>
            <input type="text" name="nama_guru" class="form-control" value="<?= htmlspecialchars($row['nama_guru']) ?>"/>
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" placeholder="Masukan Alamat"><?= htmlspecialchars($row['alamat']) ?></textarea>
        </div>
        <div class="form-group">
            <label>Nama Mapel:</label>
            <input type="text" name="nama_mapel" class="form-control" value="<?= htmlspecialchars($row['nama_mapel']) ?>"/>
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
