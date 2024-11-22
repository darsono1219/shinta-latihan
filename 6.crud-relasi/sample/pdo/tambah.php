<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
    <!-- Load file CSS Bootstrap offline -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h2>TAMBAH DATA GURU</h2>
    <form action="proses-tambah.php" method="POST">
        <div class="form-group">
            <label>Nama Guru:</label>
            <input type="text" name="nama_guru" class="form-control" placeholder="Masukan Nama"/>

        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <textarea name="alamat" class="form-control" placeholder="Masukan Alamat"></textarea>

        </div>
        <div class="form-group">
            <label>Nama Mapel:</label>
            <input type="text" name="nama_mapel" class="form-control" placeholder="Masukan Pelajaran"/>

        </div>
        <div class="form-group">
            <label>Semester:</label>
            <select name="semester" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
        </div><br>
        <div class="form-group">
            <a href="tabel.php" class="btn btn-primary">Kembali</a>
            <button type="submit" class="btn btn-success">Tambah</button>
        </div>
    </form>
</div>
</body>
</html>