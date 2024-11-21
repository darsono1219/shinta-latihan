<?php
session_start();

//Cek apakah pengguna sudah login
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>
</head>
<body>
    <h1>Selamat datang, User <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>Ini adalah halaman Untuk User.</p>
    <a href="logout.php"><button>Logout</button></a>
</body>
</html>
