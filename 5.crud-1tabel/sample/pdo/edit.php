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
    // Masukkan konfigurasi koneksi database
    include 'config.php';

    // Ambil ID dari URL
    $id = $_GET['id'];

    try {
        // Buat query untuk mengambil data siswa berdasarkan ID
        $query = "SELECT * FROM siswa WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Ambil hasil query
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Jika data tidak ditemukan, tampilkan error
        if (!$row) {
            echo "<div class='alert alert-danger'>Data tidak ditemukan!</div>";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
    ?>

    <form action="proses-edit.php" method="POST">
        <div class="form-group">
            <label>ID:</label>
            <input type="text" name="id" class="form-control" value="<?= $row['id'] ?>" readonly/>
        </div>

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
