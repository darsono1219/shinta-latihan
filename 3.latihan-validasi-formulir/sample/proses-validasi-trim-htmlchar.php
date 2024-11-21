<?php
    //Deklarasi & inisialisasi
    $nama=$_POST['nama'];

    // Deskripsi
    // lakukan penghapusan spasi awal dan akhir sekaligus merubah menjadi htmlchar

    $val=htmlspecialchars(trim($nama));
    
    // tampilkan hasilnya
    echo $val;
?>