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
    $id_user = $_POST['id'] ?? null;
    $nama_user = $_POST['nama_user']??null;
    $username = $_POST['username']??null;
    // lakukan validasi password dan hash password supaya tidak mudah dihack
    $password = password_hash(password_validate($_POST['password']), PASSWORD_BCRYPT)??null;
    $email = $_POST['email']??null;
    $role = $_POST['role']??null;

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
                    // Cek apakah pengguna sudah memiliki foto di database
                    if ($id_user) {
                        $stmt = $conn->prepare("SELECT foto_profile FROM tbl_user WHERE id = ?");
                        $stmt->bind_param("i", $id_user);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $stmt->close();
                        // Hapus file lama jika ada
                        if (!empty($old_foto_path) && file_exists($old_foto_path)) {
                            unlink($old_foto_path);
                        }
                    }
                    // Pindahkan file ke folder tujuan
                    if (move_uploaded_file($foto['tmp_name'], $foto_path)) {
                        
                        // Mulai proses update data ke database
                        $query = "UPDATE tbl_user SET nama_user = ?, username = ?, email = ?, role = ?";
                        $params = [$nama_user, $username, $email, $role];
                        $types = "ssss";

                        // Tambahkan foto jika ada perubahan
                        if (isset($target_file)) {
                            $query .= ", foto_profile = ?";
                            $params[] = $target_file;
                            $types .= "s";
                        }

                        // Tambahkan password jika diubah
                        if ($password) {
                            $query .= ", password = ?";
                            $params[] = $password;
                            $types .= "s";
                        }

                        $query .= " WHERE id = ?";
                        $params[] = $id_user;
                        $types .= "i";

                        $stmt = $conn->prepare($query);
                        $stmt->bind_param($types, ...$params);

                        if ($stmt->execute()) {
                            $_SESSION['success'] = "Data pengguna berhasil diperbarui.";
                        } else {
                            $_SESSION['errors']['gagal-simpan'] = "Terjadi kesalahan: " . $stmt->error;
                        }
                        $stmt->close();
                    } else {
                        $errors["foto-gagal"]="Gagal menyimpan Foto";
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
