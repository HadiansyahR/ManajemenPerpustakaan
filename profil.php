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
        <h6>ID: <?php echo $row['id']; ?></h6>
        <h6>Nama: <?php echo $row['name']; ?></h6>
        <h6>Email: <?php echo $row['email']; ?></h6>
        <h6>Status: <?php echo $row['status']; ?></h6>

        <!-- <img width="200px" src="img/<?php echo  $row['photo']  ?>" alt="Profil <?php echo  $row['user_name']  ?>"> -->
        <img width="200px" src="img/user.jpg" alt="Profil <?php echo  $row['name']  ?>">
        <br><br>
        <a class=" btn btn-success mr-10" href="updateProfil.php" role="button">Update</a>
        <a class=" btn btn-secondary mr-10" href="user.php" role="button">Kembali</a>
    </div>
</body>

</html>