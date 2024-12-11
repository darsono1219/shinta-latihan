<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <br>
    <h4>CRUD Sederhana Data Tabel Guru Join Mapel</h4>
    <a href="tambah.php" class="btn btn-primary" role="button">Tambah Data</a>
    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Guru</th>
            <th>Alamat</th>
            <th>Mata Pelajaran</th>
            <th>Semester</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // masukan konfigurasi koneksi database
        include 'config.php';

        try {
            // buat query select data pada tabel guru
            $sql = "SELECT * FROM guru JOIN mapel ON guru.id_guru = mapel.id_guru";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            // cek apakah data ada
            if ($stmt->rowCount() > 0) {
                //buat penomoran bayangan
                $no = 1;

                //lakukan perulangan untuk menampilkan isi dari tabel
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama_guru'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['nama_mapel'] ?></td>
                        <td><?= $row['semester'] ?></td>
                        <td>
                            <a href="view.php?id_guru=<?= $row['id_guru'] ?>" class="btn btn-info">View</a>
                            <a href="edit.php?id_guru=<?= $row['id_guru'] ?>" class="btn btn-warning">Update</a>
                            <a href="proses-delete.php?id_guru=<?= $row['id_guru'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">Tidak ada data.</td>
                </tr>
                <?php
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        </tbody>
    </table>
    
</div>
</body>
</html>
