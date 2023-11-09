<?php
include '../config/config.php';
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

if (isset($_GET['id'])) {
    $article_id = $_GET['id'];

    $sql = "DELETE FROM berita WHERE id = $article_id";
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>
            alert('Berita berhasil dihapus!');
            window.location='index.php?page=all_news.php';
        </script>";
    } else {
        echo "Gagal menghapus berita: " . mysqli_error($conn);
    }
}
?>
