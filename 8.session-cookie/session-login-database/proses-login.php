<?php
session_start();
require_once 'ConfigDatabase.php';
require_once 'LoginModel.php';

$database = new ConfigDatabase();
$db = $database->getConnection();
$user = new LoginModel($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check login credentials
    $result = $user->login($username, $password);

    if ($result) {
        // Set session variables
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['username'] = $result['username'];

        // Redirect to index
        header("Location: dashboard.php");
        exit;
    } else {
        // Redirect back to login with error
        header("Location: login.php?error=1");
        exit;
    }
}
?>
