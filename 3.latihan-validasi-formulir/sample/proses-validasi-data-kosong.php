<?php
//Deklarasi & inisialisasi
$nama=$_POST['nama'];
// Deskripsi
// lakukan pengecekan data kosong menggunakan If.. else.. kemudian tampilkan errornya

if (empty($nama)) {
    // Tampilkan error jika data Kosong
    echo "Nama tidak boleh kosong";
}else{
    // Tampilkan Nilai dari inputan
    echo "$nama";
}
?>