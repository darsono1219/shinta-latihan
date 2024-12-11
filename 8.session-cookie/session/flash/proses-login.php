<?php
// Memulai sesi
session_start();

// Simulasi data user untuk validasi login (tanpa database)
$valid_username = "user";
$valid_password = "12345";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validasi input kosong
    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = "Username dan password tidak boleh kosong.";
    }
    // Validasi panjang password
    elseif (strlen($password) < 5) {
        $_SESSION['error_message'] = "Password harus minimal 5 karakter.";
    }
    // Validasi username dan password
    elseif ($username !== $valid_username || $password !== $valid_password) {
        $_SESSION['error_message'] = "Username atau password salah.";
    }
    // Login berhasil
    else {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    }

    // Redirect kembali ke halaman login jika ada error
    header("Location: login.php");
    exit;
}
?>
