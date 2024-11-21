<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <br>
    <h4>CRUD Sederhana dengan PHP dan Bootstrap</h4>
    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No HP</th>
            <th colspan=''>Aksi</th>

        </tr>
        </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>celiboy</td>
                <td>deni</td>
                <td>indramayi</td>
                <td>deni@email.com</td>
                <td>08700000</td>
                <td>
                    <a href="" class="btn btn-warning" role="">Update</a>
                    <a href="" class="btn btn-danger" role="">Delete</a>
                </td>
            </tr>
            </tbody>
    </table>
    <a href="" class="btn btn-primary" role="">Tambah Data</a>
</div>
</body>
</html>