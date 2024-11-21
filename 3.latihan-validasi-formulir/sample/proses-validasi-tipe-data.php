<?php
    //Deklarasi & inisialisasi
    $nama=$_POST['nama'];

    // Deskripsi
    // lakukan pengecekan data inputan berupa String

    if (is_string($nama)) {
        // tampilkan pesan jika benar
        echo "Data adalah String.";
    } else {
        // tampilkan pesan jika salah
        echo "Data bukan String.";
    }

?>