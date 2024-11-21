<?php
session_start();
// fungction display ketika error
function displayError($field){
    if (isset($_SESSION['errors'][$field])){
        echo "<p style='color:red;'>{$_SESSION['errors'][$field]}</p>";
        unset($_SESSION['errors'][$field]);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css-formulir.css">
</head>
<body>
    <div class="form-container">
        <h2>Formulir Login</h2>
        <form action="proses-login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username"><br>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password"><br>
            </div>

            <?php displayError('username'); // tampil error untuk username ?>
            <?php displayError('password'); // tampil error untuk password ?>
            <?php displayError('both'); // tampil error untuk username dan password ?>
            <?php displayError('not_found'); // error jika pengguna tidak ditemukan ?>

            <br>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
