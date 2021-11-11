<?php
include 'koneksi.php';
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
if (isset($_POST['submit'])) {


    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $cek = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '" . $user . "' AND password = '" . $pass . "'");
    if (mysqli_num_rows($cek) > 0) {
        $d = mysqli_fetch_assoc($cek);
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $d;
        $_SESSION['id'] = $d["id"];
        $_SESSION['username'] = $d['username'];
        $_SESSION['level'] = $d['level'];
        header("Location: index.php");
    } else {
        echo '<script>alert("Username atau password Anda salah!")</script>';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Toko Buku</title>
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="text-center" id="login">
    <div class="row align-self-center justify-content-center align-middle">
        <div class="col-sm-5">
            <div class="box-login">
                <main class="form-signin">
                    <form action="" method="POST">
                        <h1 class="h3 mb-3 fw-normal">Please Login</h1>

                        <div class="form-floating">
                            <input name="user" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input name="pass" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <br>
                        <button name="submit" value="Login" class="w-100 btn btn-lg btn-dark" type="submit">Login</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
</body>

</html>