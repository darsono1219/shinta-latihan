<?php
session_start();

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Contoh data login (ganti dengan database)
    $validUsername = "admin";
    $validPassword = "password";

    if ($inputUsername === $validUsername && $inputPassword === $validPassword) {
        // Simpan session
        $_SESSION['username'] = $inputUsername;

        // Simpan cookie jika Remember Me dicentang
        if (isset($_POST['remember_me'])) {
            setcookie('remember_me', $inputUsername, time() + (86400 * 30), "/"); // Berlaku 30 hari
        } else {
            setcookie('remember_me', '', time() - 3600, "/"); // Hapus cookie jika tidak dicentang
        }

        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = "Username atau password salah.";
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>
