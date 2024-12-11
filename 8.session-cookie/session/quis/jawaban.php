<?php
session_start();
?>
<h2>jawaban 1 , <?= $_SESSION['answer1'] ?></h2>
<h2>jawaban 2 , <?= $_SESSION['answer2'] ?></h2>
<a href="proses-logout.php" class="btn btn-danger">Logout</a>
