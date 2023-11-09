<?php
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

$query = mysqli_query($conn, "SELECT * FROM berita");

if (isset($_POST['add_news'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $add = "INSERT INTO berita (judul, isi) VALUES ('$title', '$content')";
    if (mysqli_query($conn, $add)) {
        echo "<script type='text/javascript'>
            alert('Berita berhasil ditambahkan!');
            window.location='index.php?page=all_news.php';
        </script>";
    } else {
        echo "Gagal menambahkan berita: " . mysqli_error($conn);
    }
}

if (isset($_POST['update_news'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $update = mysqli_query($conn, "UPDATE berita SET judul='$judul', isi='$isi' WHERE id=$id");
    if ($update) {
        echo "<script type='text/javascript'>
            alert('Berita berhasil diperbarui!');
            window.location='index.php?page=all_news.php';
        </script>";
        exit();
    } else {
        echo "Gagal mengupdate berita";
    }
}


?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewsModal">Tambah berita</button>
            </div>
            <div class="modal fade" id="addNewsModal" tabindex="-1" role="dialog" aria-labelledby="addNewsModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNewsModalLabel">Tambah Berita</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <div class="form-group">
                                    <label for="title">Judul</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="content">Isi Berita</label>
                                    <textarea class="form-control" id="content" name="content"></textarea>
                                </div>
                                <button type="submit" name="add_news" class="btn btn-primary">Tambah Berita</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php while ($row = mysqli_fetch_array($query)) { ?>
        <div class="card mt-3 mb-3">
            <div class="card-body">
                <h2 class="card-title"><?= $row['judul']; ?></h2>
                <p class="card-text"><?= $row['isi']; ?></p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $row['id']; ?>">
                    Edit Berita
                </button>
                <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Berita</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $row['judul']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="isi">Isi Berita</label>
                                        <textarea class="form-control" id="isi" name="isi"><?= $row['isi']; ?></textarea>
                                    </div>
                                    <button type="submit" name="update_news" class="btn btn-primary">Update Berita</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <a href='delete.php?id=<?= $row['id']; ?>' class="btn btn-danger">Hapus Berita</a>
            </div>
        </div>
    <?php } ?>
</div>