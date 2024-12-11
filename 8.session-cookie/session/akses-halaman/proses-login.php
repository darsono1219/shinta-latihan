<?php
// Mulai session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //deklarasi & inisialisasi
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $role_user = trim($_POST['role']?? '');


    if (!empty($username) && !empty($password)) {
        //simpan role kedalam session

        $_SESSION['role'] = $role_user;
        //redirect ke dashboard
        header("Location: dashboard.php");

    } else {
        //redirect ke dashboard
        $_SESSION['error_message'] = "data anda kosong";
        header("Location: login.php");
    }
}



