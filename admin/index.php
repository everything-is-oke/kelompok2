<?php
include '../config/config.php';
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

$username = "";
if (isset($_SESSION['admin'])) {
    $admin_id = $_SESSION['admin'];
    $sql = "SELECT username FROM user WHERE id = $admin_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin panel</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="jumbotron mt-3">
            <h1 class="display-4">Selamat datang, <?=$username;?>!</h1>
        </div>
        <div class="row">
            <div class="col">
                <a href="index.php" class="btn btn-primary">Home</a>
                <a href="index.php?page=all_news.php" class="btn btn-primary">Lihat semua berita</a>
                <a href="index.php?page=settings.php" class="btn btn-primary">Pengaturan Website</a>
                <a href="logout.php" class="btn btn-danger">Keluar</a>
            </div>
        </div>
        <hr>
        <?php
        if (isset($_GET['page'])) {
        include $_GET['page'];
        } ?>
    </div>
</body>
<script src="../js/jquery-3.7.1.slim.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
