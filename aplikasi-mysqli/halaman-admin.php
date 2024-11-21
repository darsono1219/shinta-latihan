<?php
session_start();
require_once 'config.php'; //tambahkan ini untuk memanggil confignya

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
    <link rel="stylesheet" href="css-tabel.css">
</head>
<body>
    <h1>Data User</h1>
    <a href="tambah-data.php"><button class="add-button">Tambah User</button></a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1; 
                $query = "SELECT * FROM tbl_user";
                $result = $conn->query($query);
                $number =  mysqli_num_rows($result);
                if($number > 0){
                    while($row = $result->fetch_assoc()){
            ?>	
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['role']; ?></td>
                <td>
                    <a href="detail.php?id=<?= $row['id']; ?>"><button> Detail</button></a>
                    <a href="edit-data.php?id=<?= $row['id']; ?>"><button> Edit</button></a>
                    <a href="delete.php?id=<?= $row['id']; ?>"><button> Delete</button></a>
                </td>
            </tr>
            <?php } }else{ ?>
                <tr>
                    <td colspan="5">No Data Found</td>
                </tr>
            <?php } ;?>	
        </tbody>
    </table><br><br>
    <a href="logout.php"><button>Logout</button></a>
</body>
</html>
