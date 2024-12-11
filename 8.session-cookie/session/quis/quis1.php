<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['answer1'] = $_POST['answer'];
    header('Location: quis2.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Sederhana - Pertanyaan 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Kuis Sederhana</h2>
    <form method="POST">
        <h5>1. Apa ibukota Indonesia?</h5>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer" id="answer1" value="Jakarta" required>
            <label class="form-check-label" for="answer1">Jakarta</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer" id="answer2" value="Bandung">
            <label class="form-check-label" for="answer2">Bandung</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer" id="answer3" value="Surabaya">
            <label class="form-check-label" for="answer3">Surabaya</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Next</button>
    </form>
</div>
</body>
</html>
