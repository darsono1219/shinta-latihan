<?php
//Deklarasi & inisialisasi
$file = $_FILES['upload'];
$maxSize = 1 * 1024 * 1024; // Maksimum 1MB

// Deskripsi
// lakukan pengecekan ukuran file
if ($file['size'] <= $maxSize) {
    // tampilkan pesan jika ukuran sudah sesuai
    echo "Ukuran file valid.";
} else {
    // tampilkan pesan jika ukuran tidak sesuai
    echo "Ukuran file terlalu besar.";
}
?>