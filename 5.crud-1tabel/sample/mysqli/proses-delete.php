<?php
    include 'config.php';

    $id = $_GET['id'];
    $sql = "DELETE FROM siswa WHERE id=$id";
    $result=$conn->query($sql);

    if ( $result === TRUE) {
        header("Location: tabel.php");
    } else {
        echo "Error: " . $conn->error;
    }
    ?>
?>