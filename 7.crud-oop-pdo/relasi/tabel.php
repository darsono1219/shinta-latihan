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
                include 'ConfigDatabase.php';
                include 'GuruTransaktion.php';

                $database = new ConfigDatabase();
                $db = $database->getConnection();

                $guru = new GuruTransaktion($db);
                $data = $guru->read();
                $no=1;
                foreach ($data as $row):
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
                <?php endforeach; ?>
        </tbody>
    </table>
    <a href="tambah.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
