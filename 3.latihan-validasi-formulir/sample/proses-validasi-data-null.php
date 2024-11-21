<?php
    //Deklarasi & inisialisasi
    $nama=$_POST['nama']??null;

    // Deskripsi
    // lakukan pengecekan data null menggunakan If.. else.. kemudian tampilkan errornya

    if (is_null($nama)) {
        // Tampilkan error jika data null
        echo "Kolom alamat tidak boleh bernilai null.";
    }else{
        // Tampilkan Nilai dari inputan
        echo "$nama";
    }
?>