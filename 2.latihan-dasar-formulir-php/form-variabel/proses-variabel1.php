<?php
//Deklarasi & inisalisasi
$nama_ayah = $_POST['nama_ayah'];

// Deskripsi
// Tampilkan seluruh Data

if (empty($nama_ayah)) {
// Tampilkan error jika data Kosong
    echo "Nama tidak boleh kosong";
}else{
// Tampilkan Nilai dari inputan
    echo "$nama_ayah";
}
?>