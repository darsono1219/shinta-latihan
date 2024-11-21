<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
    <!-- Load file CSS Bootstrap offline -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h2>TAMBAH DATA SISWA</h2>
    <form action="proses-tambah.php" method="POST">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama"/>

        </div>
        <div class="form-group">
            <label>Kelas:</label>
            <input type="text" name="kelas" class="form-control" placeholder="Masukan Kelas"/>

        </div>
        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan"/>

        </div><br>
        <div class="form-group">
            <a href="tabel.php" class="btn btn-primary">Kembali</a>
            <button type="submit" class="btn btn-success">Tambah</button>
        </div>
    </form>
</div>
</body>
</html>