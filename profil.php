<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container form" id="block">
        <h3>PROFIL</h3>
        <br>
        <h6>ID: <?php echo $_SESSION['user_id']; ?></h6>
        <h6>Nama: <?php echo $_SESSION['user_name']; ?></h6>
        <h6>Email: <?php echo $_SESSION['user_email']; ?></h6>
        <h6>Status: <?php echo $_SESSION['user_status']; ?></h6>

        <img width="200px" src="img/<?php echo  $_SESSION['user_photo']  ?>" alt="Profil <?php echo  $_SESSION['user_name']  ?>">
    </div>
</body>

</html>