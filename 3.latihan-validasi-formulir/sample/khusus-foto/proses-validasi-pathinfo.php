<?php
//Deklarasi & inisialisasi
$file = $_FILES['upload'];
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

// Deskripsi
// Mendapatkan ekstensi file
$fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

// lakukan pengecekan extension file
if (in_array($fileExtension, $allowedExtensions)) {
    // tampilkan pesan jika tipe ekstension sudah sesuai
    echo "Ekstensi file valid.";
} else {
    // tampilkan pesan jika tipe ekstension sudah sesuai
    echo "Ekstensi file tidak valid. ekstensi file harus jpg, jpeg, png atau gif";
}
?>
