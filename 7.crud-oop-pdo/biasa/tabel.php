<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">CRUD Data Siswa 1 Tabel</h2>
    <a href="tambah.php" class="btn btn-primary mb-3 btn-sm">Tambah Data</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once 'ConfigDatabase.php';
        require_once 'Siswa.php';

        $database = new ConfigDatabase();
        $db = $database->getConnection();
        $siswa = new Siswa($db);
        $data = $siswa->readAll();
        foreach ($data as $row):
        ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['kelas'] ?></td>
                <td><?= $row['jurusan'] ?></td>
                <td>
                    <a href="view.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">View</a>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="proses-delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
</body>
</html>

