<?php
// Mulai session
session_start();
//deklarasi & inisialisasi
$username = $_POST['username'];
$password = $_POST['password'];

// Setelah login berhasil
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;

//redirect ke dashboard
header("Location: dashboard.php");

