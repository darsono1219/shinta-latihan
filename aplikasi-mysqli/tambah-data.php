<?php
session_start();
// fungction display ketika error
function displayError($field){
    if (isset($_SESSION['errors'][$field])){
        echo "<p style='color:red;'>{$_SESSION['errors'][$field]}</p>";

        //hilangkan session setelah muncul
        unset($_SESSION['errors'][$field]); 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link rel="stylesheet" href="css-formulir.css">
</head>
<body>
    <div class="form-container">
        <h2>Tambah User</h2>
        <?php displayError('password'); // tampil error untuk jenis method ?>
        <?php displayError('jenis-method'); // tampil error untuk jenis method ?>
        <?php displayError('foto-gagal'); // tampil error untuk terkait dengan foto ?>
        <?php displayError('gagal-simpan'); // tampil error untuk terkait penyimpnan data ?>
        <?php displayError('duplikat'); // tampil error jika sudah pernah menyimpan data yang sama?>

        <form action="proses-tambah-user.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" id="foto" name="foto" accept="image/*">
            </div>
            <div class="form-group">
                <label for="nama_user">Nama User:</label>
                <input type="text" id="nama_user" name="nama_user" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Tambah User</button>
            </div>
        </form>
        <div class="form-group">
            <a href="halaman-admin.php"><button>Kembali</button></a>
        </div>
    </div>
</body>
</html>
