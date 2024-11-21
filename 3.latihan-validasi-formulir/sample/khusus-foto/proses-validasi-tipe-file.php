<?php
//Deklarasi & inisialisasi
$file = $_FILES['upload'];

$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

// Deskripsi
// lakukan pengecekan tipe MIME
if (in_array($file['type'], $allowedTypes)) {
    // tampilkan pesan jika tipe mime sudah sesuai
    echo "Tipe MIME valid. Silahkan lanjutkan ";
} else {
    // tampilkan pesan jika tipe mime jika tidak sesuai
    echo "Tipe MIME tidak valid. tipe MIME harus jpg, gif atau png";
}
?>