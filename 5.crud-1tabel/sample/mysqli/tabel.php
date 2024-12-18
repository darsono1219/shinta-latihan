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
        // masukan konfigurasi koneksi database
        include 'config.php';

        // deskripsi
        // buat query select data pada tabel siswa
        $sql = "SELECT * FROM siswa";
        $result = $conn->query($sql);

        // jika row tidak kosong maka tampilkan data kosong pada tabel
        // jika tidak pecah data menggunakan array
        if ($result->num_rows > 0) {
            //buat penomoran bayangan
            $no = 1;

            //lakukan perulangan untuk menampilkan isi dari tabel
            while ($row = $result->fetch_assoc()) {
               
                ?>
                <tr>
                    <td><?= $no++ ?></td>
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
        //putuskan koneksi dengan database
        $conn->close();
        ?>
        </tbody>
    </table>
    <a href="tambah.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
