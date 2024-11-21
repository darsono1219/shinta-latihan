<?php
//pastikan aktifkan session
session_start();

// Panggil file koneksi database
include 'config.php';

//buat variabel penampung error dan sukses
$errors=[];
$success=[];

/*validasi password
        1. harus ada min 1 huruf besar
        2. harus ada min 1 huruf huruf kecil
        3. harus ada min 1 angka
        4. harus ada min 1 karakter khusus 
        5. panjang minimal 8 karakter
*/
function password_validate($data) {
    // lakukan Validasi password menggunakan regex
    if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/', $data)) {
        $errors["password"] = "Password harus mengandung minimal 8 karakter, dengan kombinasi huruf besar, huruf kecil, angka, dan karakter khusus.";
        header("Location: tambah-data.php");
        exit();
    }

    return $data;
}

//cek method yang digunakan adalah post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $nama_user = $_POST['nama_user'];
    $username = $_POST['username'];

    // lakukan validasi password dan hash password supaya tidak mudah dihack
    $password = password_hash(password_validate($_POST['password']), PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Proses upload foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto'];
        $foto_name = basename($foto['name']); // exsample gambar.jpg
        $foto_size = $foto['size']; // ukuran foto dalam byte ex 1mb = 1.000.000 byte
        $foto_type = $foto['type']; // jenis MIME dari file yang diunggah (misalnya, image/jpeg atau image/png
        
        // Tentukan direktori penyimpanan file
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        // Tentukan lokasi file yang akan disimpan
        $foto_path = $target_dir . $foto_name;

        // Validasi tipe file yang boleh diupload
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
        if (in_array($foto_type, $allowed_types)) { 
            // Batasi Ukuran file foto yang diupload Maksimal 2MB. 
            if($foto_size <= 2000000){
                // **VALIDASI DUPLIKASI DATA**
                $query_check = "SELECT * FROM tbl_user WHERE username = ? OR email = ?";
                $stmt_check = $conn->prepare($query_check);
                $stmt_check->bind_param("ss", $username, $email);
                $stmt_check->execute();
                $result_check = $stmt_check->get_result();

                if ($result_check->num_rows > 0) {
                    $errors["duplikat"] = "Username atau Email sudah terdaftar.";
                } else {
                    // Pindahkan file ke folder tujuan
                    if (move_uploaded_file($foto['tmp_name'], $foto_path)) {
                        // Simpan data ke database
                        $query = "INSERT INTO tbl_user (foto_profile, ukuran_file, jenis_file, nama_user, username, password, email, role)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                                
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("sissssss", $foto_path, $foto_size, $foto_type, $nama_user, $username, $password, $email, $role);
                        
                        if ($stmt->execute()) {
                            $success["berhasil"]="User berhasil ditambahkan!";
                        } else {
                            $errors["gagal-simpan"]="Terjadi kesalahan: " . $conn->error;
                        }
                        $stmt->close();
                    } else {
                        $errors["foto-gagal"]="Gagal menyimpan Foto";
                    }
                }  
            }else{
                $errors["foto-gagal"]="Ukuran file maksimal 2MB yang diperbolehkan.";
            }
        } else {
            $errors["foto-gagal"]="Tipe file tidak valid. Hanya file JPG, JPEG, dan PNG yang diperbolehkan.";
            
        }
    } else {
        $errors["foto-gagal"]="Foto belum diunggah atau terdapat kesalahan saat mengunggah foto.";
    }
    // Tutup koneksi
    $conn->close();
} else {
    $errors["jenis-method"]="Metode tidak valid.";
    header("Location: tambah-data.php");
    exit();
}

// Jika ada kesalahan, kembalikan ke halaman login
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: tambah-data.php");
    exit();
}else{
    $_SESSION['success'] = $success;
    header("Location: halaman-admin.php"); // Kembali ke halaman admin
    exit();
}
?>
