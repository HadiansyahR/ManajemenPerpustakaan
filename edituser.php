<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/editdata.css">
    <title>Edit User</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <a class="logo" href="./user.php"><img src="icon/22.png" alt=""></a>
            <a class="atr" href="./user.php?logout=1"><img src="icon/logoff.png" alt=""></a>
        </header>
        <main>
            <form id="up" method="post" action="actionUpdate.php?id=<?= $_SESSION['user_id'] ?>">
                <h1>Edit <span>User</span></h1>
                <div class="update">
                    <label for="fname"><span>Name:</span> <input type="text" id="fname" name="user_name" value="<?= $_SESSION['user_name'] ?>"></label>
                    <label for="Email"><span>Email:</span> <input type="email" id="email" name="user_email" value="<?= $_SESSION['user_email'] ?>"></label>
                    <label for="Telephone"><span>No Telp:</span> <input type="text" id="telp" name="user_telp" value="<?= $_SESSION['user_telp'] ?>"></label>
                    <label for="Password"><span>Password:</span> <input type="password" id="password" name="user_password" value="<?= $_SESSION['user_password'] ?>"></label>
                </div>
                <input type="submit" value="UPDATE">
                <a href="./profil.php">Kembali ke laman profile?</a>
            </form>
            <div class="picture">
                <img class="picture" src="img/profil/<?= $_SESSION['user_photo'] ?>" alt="">
                <!-- <form id="img">
                    <label for="image">Upload an image:</label> <br>
                    <input type="file" id="image" name="image" accept="image/*">
                    <button onclick="document.getElementById('image').click()">CLICK ME</button>
                </form> -->
            </div>
        </main>
    </div>
</body>

</html>