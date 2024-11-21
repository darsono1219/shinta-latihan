<?php
session_start();
include_once 'config.php';

// Mendapatkan ID pengguna dari URL
$id_user = $_GET['id'] ?? null;

if ($id_user) {
    // Query untuk mengambil data pengguna berdasarkan ID
    $query = "SELECT * FROM tbl_user WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah data ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        $_SESSION['errors']['not-found'] = "Data pengguna tidak ditemukan.";
        header("Location: halaman-admin.php");
        exit();
    }
} else {
    $_SESSION['errors']['invalid-id'] = "ID pengguna tidak valid.";
    header("Location: halaman-admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="css-formulir.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit User</h2>
        
        <form action="proses-edit-user.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
            
            <div class="form-group">
                <label for="foto">Foto:</label>
                <?php if (!empty($user['foto_profile'])): ?>
                    <img src="<?= htmlspecialchars("uploads/".basename($user['foto_profile'])) ?>" alt="Foto Profil" class="profile-photo" style="width:150px">
                <?php endif; ?>
                <input type="file" id="foto" name="foto" accept="image/*">
            </div>
            
            <div class="form-group">
                <label for="nama_user">Nama User:</label>
                <input type="text" id="nama_user" name="nama_user" value="<?= htmlspecialchars($user['nama_user']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password (biarkan kosong jika tidak ingin mengubah):</label>
                <input type="password" id="password" name="password">
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
            </div>
            
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                </select>
            </div>
            
            <div class="form-group">
                <button type="submit">Simpan Perubahan</button>
            </div>
        </form>
        
        <div class="form-group">
            <a href="halaman-admin.php"><button>Kembali</button></a>
        </div>
    </div>
</body>
</html>
