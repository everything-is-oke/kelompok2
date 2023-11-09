<?php
include '../config/config.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

    if (mysqli_num_rows($query) == 0) {
        echo "<script type='text/javascript'>
        alert('Username dan password salah!');
        window.location='login.php';
        </script>";
    } else {
        $_SESSION['admin'] = 1;
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        .card {
            margin: 0 auto;
            margin-top: 100px;
            width: 300px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
        <h4 class="text-center">Login Panel</h4>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
