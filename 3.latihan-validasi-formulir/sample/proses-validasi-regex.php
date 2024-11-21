<?php
    $nama = $_POST['nama'];

    // 1. Harus ada minimal 1 huruf besar
    if (!preg_match('/[A-Z]/', $nama)) {
        echo "Nama harus mengandung minimal 1 huruf besar.";
    }

    // 2. Harus ada minimal 1 huruf kecil
    if (!preg_match('/[a-z]/', $nama)) {
        echo "Nama harus mengandung minimal 1 huruf kecil.";
    }

    // 3. Harus ada minimal 1 angka
    if (!preg_match('/[0-9]/', $nama)) {
        echo "Nama harus mengandung minimal 1 angka.";
    }

    // 4. Harus ada minimal 1 karakter khusus
    if (!preg_match('/[\W_]/', $nama)) {
        echo "Nama harus mengandung minimal 1 karakter khusus (misal: @, #, $, dll).";
    }


?>