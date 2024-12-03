<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg" style="width: 24rem;">
        <h3 class="text-center mb-4">Registrasi</h3>
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Masukkan password" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Unggah Foto</label>
                <input type="file" class="form-control" id="photo" accept="image/*">
            </div>
            <button type="submit" class="btn btn-success w-100">Daftar</button>
        </form>
        <div class="text-center mt-3">
            <a href="index.html" class="text-decoration-none">Sudah punya akun? Login di sini</a>
        </div>
    </div>
</div>

</body>
</html>
