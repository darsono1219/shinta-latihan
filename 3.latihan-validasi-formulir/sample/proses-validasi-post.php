<?php
//Deklarasi & inisialisasi
$nama=$_POST['nama'];
// Deskripsi
// lakukan pengecekan method yang digunakan pos menggunakan If.. else..

if ($_SERVER["REQUEST_METHOD"]=="POST" ){
    // Tampilkan Nilai dari inputan
    echo "$nama";
} else {
    // Jika bukan metode POST, redirect atau tampilkan pesan error
    echo "Form hanya dapat diakses melalui metode POST.";
}

?>