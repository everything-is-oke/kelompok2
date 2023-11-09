<?php
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

if (isset($_POST['submit_judul'])) {
    $judul_web = $_POST['judul_web'];

    $sql = "UPDATE halaman_utama SET judul_web = '$judul_web' WHERE id = 1";
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>
        alert('Berhasil mengganti nama!');
        window.location='index.php?page=settings.php';
        </script>";
    } else {
        echo "Gagal mengubah judul website: " . mysqli_error($conn);
    }
}

if (isset($_POST['submit_text'])) {
    $text_berjalan = $_POST['text_berjalan'];

    $sql = "UPDATE halaman_utama SET text_berjalan = '$text_berjalan' WHERE id = 1";
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>
        alert('Berhasil mengganti text berjalan!');
        window.location='index.php?page=settings.php';
        </script>";
    } else {
        echo "Gagal mengubah text berjalan: " . mysqli_error($conn);
    }
}

if (isset($_POST['submit_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    $sql = "SELECT * FROM user WHERE username = 'admin' AND password = '$old_password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $sql = "UPDATE user SET password = '$new_password' WHERE username = 'admin'";
        if (mysqli_query($conn, $sql)) {
            echo "<script type='text/javascript'>
            alert('Berhasil mengubah password!');
            window.location='index.php?page=settings.php';
            </script>";
        } else {
            echo "Gagal mengubah password: " . mysqli_error($conn);
        }
    } else {
        echo "<script type='text/javascript'>
        alert('Password lama salah!');
        window.location='index.php?page=settings.php';
        </script>";
    }
}
?>
<div class="container mb-3">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Tampilan Beranda</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="judul_web">Ubah Nama Website</label>
                    <input type="text" class="form-control" id="judul_web" name="judul_web" required>
                    <button type="submit" name="submit_judul" class="btn btn-primary mt-3">Submit</button>
                </div>
                <div class="form-group mt-3">
                    <label for="text_berjalan">Ubah Text Berjalan</label>
                    <input type="text" class="form-control" id="text_berjalan" name="text_berjalan">
                </div>
                <button type="submit" name="submit_text" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<div class="container mb-3">
    <div class="card mt-3">
        <div class="card-body">
            <h2 class="card-title text-center">Ubah Password Login</h2>
            <form method="POST" action="">
                <div class="form-group mt-3">
                    <label for="new_password">Masukan Password Baru</label>
                    <input type="text" class="form-control" id="new_password" name="new_password" required>
                </div>
                <div class="form-group mt-3">
                    <label for="old_password">Masukan Password Lama</label>
                    <input type="text" class="form-control" id="old_password" name="old_password" required>
                </div>
                <button type="submit" name="submit_password" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>