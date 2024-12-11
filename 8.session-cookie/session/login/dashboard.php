<?php
session_start();
?>
<h2>Welcome, <?= $_SESSION['username']?></h2>
<h2>Password anda, <?= $_SESSION['password'] ?></h2>
<a href="proses-logout.php" class="btn btn-danger">Logout</a>
