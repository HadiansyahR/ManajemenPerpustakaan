<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/Log-regist.css">
</head>


<body>
    <section class="Left-content2">
        <h1 id="2h">SELAMAT<font color="#5907EF"> DATANG</font>
        </h1>
        <p class="fw-medium" id="2p">Silakan isi data anda untuk pendaftaran</p>

        <div class="Login-form2">
            <form action="action.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">User Name</label>
                    <input type="username" class="form-control" name="user_name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="user_email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="user_password">
                </div>
                <div class="mb-3">
                    <p>Photo</p>
                    <div class="custom-file">
                        <input type="file" name="photo" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary2" name="login_btn">Register</button>
                <br>
                <p style="display: inline;">Sudah Punya Akun ? </p>
                <a class href="login.php">Login</a>
            </form>
        </div>
    </section>

    <section class="Right-content2">
        <span>
            <img src="img/iconbuku_login.png" id="book-icon2" alt="">
        </span>
    </section>

</body>

</html>