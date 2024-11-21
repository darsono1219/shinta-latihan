<?php
    //Deklarasi & inisialisasi 
    $nama = $_POST['nama'];

    // Deskripsi
    // cek Panjang String minimal 8 karakter
    if (strlen($nama) < 8) {
        echo "Nama harus memiliki panjang minimal 8 karakter.";
    }

?>