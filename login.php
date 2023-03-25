<?php
session_start();
include('server/connection.php');
if (isset($_SESSION['logged_in'])) {
    header('location: index.php');
    exit;
}
if (isset($_POST['login_btn'])) {

    $email = $_POST['user_email'];
    $password = ($_POST['user_password']);

    $query = "SELECT * FROM member
    WHERE user_email = ? AND user_password = ? LIMIT 1";

    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('ss', $email, $password);


    if ($stmt_login->execute()) {

        $stmt_login->bind_result(
            $user_id,
            $user_name,
            $user_email,
            $user_password,
            $user_phone,
            $user_address,
            $user_city,
            $user_photo
        );
        $stmt_login->store_result();

        if ($stmt_login->num_rows() == 1) {

            $stmt_login->fetch();

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_phone'] = $user_phone;
            $_SESSION['user_address'] = $user_address;
            $_SESSION['user_city'] = $user_city;
            $_SESSION['user_photo'] = $user_photo;
            $_SESSION['logged_in'] = true;

            header('location: index.php?message=Login berhasil');
        } else {
            header('location: login.php?error=Email atau Password salah!');
        }
    } else {
        header('location: login.php?error=Terjadi suatu kesalahan!');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/Login.css">
    <title>Login</title>
</head>

<body>
    <section class="Left-content">
        <h1>SELAMAT<font color="#5907EF"> DATANG</font>
        </h1>
        <p class="fw-medium">Silakan isi data anda untuk masuk</p>

        <div class="Login-form">
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="error">
                    <?php
                    if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-primary">LOGIN</button>
            </form>
        </div>
    </section>

    <section class="Right-content">
        <span>
            <img src="img/iconbuku_login.png" id="book-icon" alt="">
        </span>
    </section>
</body>

</html>