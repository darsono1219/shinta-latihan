<?php
//Deklarasi & inisialisasi

// Mime yang diperbolehkan

// ekstensi yang diperbolehkan

// ukuran yang diperbolehkan 1 MB

// pengecekan path ekstension

// Deskripsi 
// lakukan pengecekan file gagal upload
if () {
    // lakukan pengecekan Type dan Ekstensi Mime
    if () {
        // lakukan pengecekan Ukuran Foto
        if () {
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