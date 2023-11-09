<?php
$query = mysqli_prepare($conn, "SELECT * FROM berita");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_prepare($conn, "SELECT * FROM berita WHERE id = ?");
    mysqli_stmt_bind_param($query, "i", $id);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
} else {
    $result = mysqli_query($conn, "SELECT * FROM berita");
}

?>
<?php if (isset($_GET['id'])) { ?>
    <table cellspacing="21" cellpadding="21">
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td>
                    <a href="?page=home.php&id=<?= $row['id']; ?>" class="judul">
                        <h2><?= $row['judul']; ?></h2>
                    </a>

                </td>
            </tr>
            <tr>
                <td><?= $row['isi']; ?></td>
            </tr>
            <tr>
                <td><a href="?page=home.php">Kembali</a></td>
            </tr>
        <?php } ?>
    </table>
<?php } else { ?>
    <table cellspacing="21" cellpadding="21">
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td>
                    <a href="?page=home.php&id=<?= $row['id']; ?>" class="judul">
                        <h2><?= $row['judul']; ?></h2>
                    </a>
                    <?= substr($row['isi'], 0, 300); ?>...<a href="?page=home.php&id=<?= $row['id']; ?>">Read more</a>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php } ?>