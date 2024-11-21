<?php
//Deklarasi & inisialisasi
$file = $_FILES['upload'];

// Deskripsi 
// lakukan pengecekan gagal Upload
if ($file['error'] === UPLOAD_ERR_OK) {
    // tampilkan pesan jika file gagal diupload
    echo "File berhasil diunggah.";
} else {
    // tampilkan pesan jika berhasil diupload
    echo "Terjadi kesalahan saat mengunggah file.";
}
?>