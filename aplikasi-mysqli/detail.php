<?php
// Koneksi ke database
include 'config.php';

// Mendapatkan ID pengguna dari URL
$id_user = $_GET['id'] ?? null;
$error_message = ""; // Inisialisasi pesan error

if ($id_user) {
    // Query untuk mengambil data pengguna berdasarkan ID
    $query = "SELECT foto_profile, nama_user, username, email, role FROM tbl_user WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah data ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        $error_message = "Data pengguna tidak ditemukan.";
    }
} else {
    $error_message = "ID pengguna tidak valid.";
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengguna</title>
    <link rel="stylesheet" href="css-detail.css"> <!-- Tambahkan file CSS jika ingin lebih rapi -->
</head>
<body>
    <div class="detail-container">
        <h2>Detail Data Users Terdaftar</h2>

        <!-- Tampilkan pesan error di atas foto profil jika ada -->
        <?php if (!empty($error_message)): ?>
            <p style="color:red;"><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>

        <!-- Menampilkan Foto -->
        <div class="detail-group">
            <label>Foto:</label>
            <?php if (!empty($user['foto_profile']) && file_exists("uploads/".basename($user['foto_profile']))): ?>
                <img src="<?= htmlspecialchars("uploads/".basename($user['foto_profile'])) ?>" alt="Foto Profil" class="profile-photo">
            <?php else: ?>
                <p style="color:red;">Foto tidak tersedia</p>
            <?php endif; ?>
        </div>

        <!-- Menampilkan Nama User -->
        <div class="detail-group">
            <label>Nama User:</label>
            <p><?= htmlspecialchars($user['nama_user'] ?? '-') ?></p>
        </div>

        <!-- Menampilkan Username -->
        <div class="detail-group">
            <label>Username:</label>
            <p><?= htmlspecialchars($user['username'] ?? '-') ?></p>
        </div>

        <!-- Menampilkan Email -->
        <div class="detail-group">
            <label>Email:</label>
            <p><?= htmlspecialchars($user['email'] ?? '-') ?></p>
        </div>

        <!-- Menampilkan Role -->
        <div class="detail-group">
            <label>Role:</label>
            <p><?= htmlspecialchars($user['role'] ?? '-') ?></p>
        </div>

        <!-- Tombol Kembali -->
        <div class="detail-group">
            <a href="halaman-admin.php"><button>Kembali</button></a>
        </div>
    </div>
</body>
</html>
