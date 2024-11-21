<?php
//Deklarasi & inisialisasi
$file = $_FILES['upload'];
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
$maxSize = 2 * 1024 * 1024; // Maksimum 2MB
$fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

// Deskripsi 
// lakukan pengecekan file gagal upload
if ($file['error'] === UPLOAD_ERR_OK) {
    // lakukan pengecekan Type dan Ekstensi Mime
    if (in_array($file['type'], $allowedTypes) && in_array($fileExtension, $allowedExtensions)) {
        // lakukan pengecekan Ukuran Foto
        if ($file['size'] <= $maxSize) {
            // Tampilkan Pesan Berhasil di Proses
            echo "File valid dan siap diproses.";
        } else {
            // Tampilkan Pesan gagal karena ukuran terlalu besar
            echo "Ukuran file terlalu besar.";
        }
    } else {
        // Tampilkan Pesan karena ekstensi tidak sesuai
        echo "Tipe atau ekstensi file tidak valid.";
    }
} else {
    // tampilkan pesan jika terjadi kegagalan Upload
    echo "Terjadi kesalahan saat mengunggah file.";
}
?>