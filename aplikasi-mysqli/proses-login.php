<?php
// proses_login.php
session_start();
require_once 'config.php';

$errors = [];
$input = [];

// Fungsi untuk memproses input (trim, stripslashes, htmlspecialchars)
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// Validasi dengan memeriksa metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Proses input dari form
    $username = test_input(isset($_POST['username']) ? $_POST['username'] : '');
    $password = test_input(isset($_POST['password']) ? $_POST['password'] : '');

    // Jika username & password kosong maka tampilkan kesalahan “password dan username tidak boleh kosong”
    if (empty($username) && empty($password)) {
        $errors['both'] = "Password dan username tidak boleh kosong";
    } else {
        //Jika username kosong maka tampilkan kesalahan “username tidak boleh kosong”
        if (empty($username)) {
            $errors['username'] = "Username tidak boleh kosong";
        }
        // Jika password kosong maka tampilkan kesalahan “password tidak boleh kosong”
        if (empty($password)) {
            $errors['password'] = "Password tidak boleh kosong";
        }
    }

    // Jika ada kesalahan, kembalikan ke halaman login
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['input'] = $input;
        header("Location: login.php");
        exit();
    }

    try {
        
        //Lakukan pemeriksaan data ke table di database dengan bind_param
        $query = "SELECT * FROM tbl_user WHERE username = ? AND password = ? ";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Jika username ditemukan
        if($result->num_rows > 0) {
            $data_user = $result->fetch_assoc();
            
                //Jika username dan password ditemukan simpan username dan role kedalam session
                $_SESSION['username'] = $data_user['username'];
                $_SESSION['role'] = $data_user['role'];

                if ($data_user['role'] === 'admin') {
                    header("Location: halaman-admin.php");
                    exit();
                } else {
                    header("Location: halaman-user.php");
                    exit();
                }
            
        } else {
            //Jika username tidak ditemukan
            $_SESSION['errors']['not_found'] = "Data tidak ditemukan";
            header("Location: login.php");
            exit();
        }
    } catch (mysqli_sql_exception $e) {
        // Handle error jika ada
        $_SESSION['message'] = "Terjadi kesalahan: " . $e->getMessage();
        header("Location: login.php");
        exit();
    }
}
?>
