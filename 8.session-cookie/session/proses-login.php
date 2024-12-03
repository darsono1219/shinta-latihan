<?php
session_start(); // Mulai session

// Koneksi database menggunakan PDO
$dsn = 'mysql:host=localhost;dbname=belajar';
$username = 'root';
$password = '';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO($dsn, $username, $password, $options);

    // Login pengguna
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['email' => $email, 'password' => $password]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Simpan informasi ke session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            echo "Login berhasil! Selamat datang, " . $_SESSION['user_name'];
        } else {
            echo "Email atau password salah.";
        }
    }
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
