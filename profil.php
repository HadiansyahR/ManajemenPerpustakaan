<?php
session_start();
include('server/connection.php');
$id = $_SESSION['user_id'];
$sql = "Select * from akun WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_email'] = $row['email'];
}
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/styleprofile.css">
    <link rel="shortcut icon" href="./icon/white2.png" type="image/x-icon">
</head>

<body>
    <div class="wrapper">
        <header>
            <a class="logo" href="./user.php"><img src="icon/22.png" alt=""></a>
            <a class="atr" href="./user.php?logout=1"><img src="icon/logoff.png" alt=""></a>
        </header>
        <main>
            <div class="data">
                <img class="picture" src="img/profil/<?php echo $row['photo'] ?>" alt="">
                <section class="user">
                    <p class="username"><?php echo $row['name'] ?></p>
                    <div class="email">
                        <p><span class="usr-email">Email</span></p>
                        <p class="star"><?php echo $row['email'] ?></p>
                    </div>
                    <div class="status">
                        <p><span class="usr-sta">Status</span></p>
                        <p class="star"><?php echo $row['status'] ?></p>
                    </div>
                    <div class="square"></div>
                </section>
                <section class="update">
                    <h1>Update profile Anda?</h1>
                    <p>Mari lengkapi identitas Anda</p>
                    <br>
                    <a class="button btn btn-success mr-10" href="updateProfil.php" role="button">EDIT</a>
                    <!-- <br> -->
                    <!-- <button href="./updateProfil.php">EDIT</button> -->
                    <a class="link" href="./user.php">Kembali ke homepage?</a>
                </section>
            </div>
        </main>
        <footer>
            <p>2023 @RumahBuku</p>
        </footer>
    </div>
</body>

</html>