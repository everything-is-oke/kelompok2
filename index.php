<?php
include 'config/config.php';
$query = mysqli_query($conn, "SELECT judul_web FROM halaman_utama WHERE id = 1");
$row = mysqli_fetch_assoc($query);
$judul_web = $row['judul_web'];

$query_text_berjalan = mysqli_query($conn, "SELECT text_berjalan FROM halaman_utama WHERE id = 1");
$row_text_berjalan = mysqli_fetch_assoc($query_text_berjalan);
$text_berjalan = $row_text_berjalan['text_berjalan'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $judul_web; ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="jumbotron mt-3">
            <h1 class="display-4 text-center"><?= $judul_web; ?></h1>
        </div>
        <div class="row">
            <div class="col">
                <marquee><?= $text_berjalan; ?></marquee>
            </div>
        </div>
        <hr>

        <?php
        if (isset($_GET['page'])) {
            include $_GET['page'];
        } else {
            include 'home.php';
        }
        ?>
    </div>
</body>
</html>
