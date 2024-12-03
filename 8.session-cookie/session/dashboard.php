<?php
session_start();
if (isset($_SESSION['user_name'])) {
    echo "Selamat datang, " . $_SESSION['user_name'];
} else {
    echo "Anda belum login.";
}
?>
