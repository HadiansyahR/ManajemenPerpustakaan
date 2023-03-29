<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Kertas</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logo.png" type="image/png">
</head>

<body>

    <div class="sidebar">
        <ul>
            <li>
                <a href="<?php echo $_POST['profil']; ?> "><img class="side" width="40px" src="img/profile.png" alt="Profil"></a>
            </li>
            <li>
                <a href="<?php echo $_POST['buku']; ?>"><img class="side" width="40px" src="img/book.png" alt="Book"></a>
            </li>
            <a class="logout" href="index.php?logout=1"><img width="40px" src="img/exit.png" alt="Logout!"></a>
        </ul>
    </div>
    <header>
        <img width="100px" src="img/logo.png" alt="Rumah Kertas">
    </header>
    <div class="container">