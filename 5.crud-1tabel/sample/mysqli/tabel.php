<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <br>
    <h4>CRUD Sederhana Data Tabel Siswa</h4>
    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'config.php';

        $sql = "SELECT * FROM siswa";
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
            $no = 1;
            while ($row = $result->fetch_assoc()) {
               
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['kelas'] ?></td>
                    <td><?= $row['jurusan'] ?></td>
                    <td>
                        <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-info">View</a>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Update</a>
                        <a href="proses-delete.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="5">Tidak ada data.</td>
            </tr>
            <?php
        }
        $conn->close();
        ?>
        </tbody>
    </table>
    <a href="tambah.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
