<?php
session_start();
include('server/connection.php');

$sql = "Select * from akun WHERE status = 'User'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}
if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    if (strlen($keyword) > 0) {
        $q = "Select * from akun WHERE name LIKE '%$keyword%' && status = 'User' ";
    } else {
        $q = "Select * from akun WHERE status = 'User'";
    }
} else {
    $q = "Select * from akun WHERE status = 'User'";
}
$result = mysqli_query($conn, $q);




if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}
if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        header('location: login.php');
        exit;
    }
}

$name = $row['name'];
$photo_name = str_replace(' ', '_', $name) . ".jpg";
$_POST['profil'] = 'dataProfil.php';
$_POST['buku'] = 'index.php';
include('layouts/header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="icon/home.png" type="image/png">
</head>

<body>
    <div class="container" id="block">
        <br><br>
        <div class="search">
            <form class="search ml-200 " action="" method="post">
                <input type="text" name="keyword" placeholder="Masukan Nama User">
                <button type="submit" class="btn btn-success" name="cari">Cari</button>
            </form>
        </div>
        <br><br>
        <table class="table table-warning ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Photo Profil</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td>
                            <img width="100" src="img/profil/<?php echo $row['photo'] ?>" alt="Foto <?php echo $row['name'] ?>">
                        </td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td>
                            <a class="text-danger" href="DeleteUser.php?id=<?= $row['id']; ?>" role="button" onclick="return confirm('Data dari <?= $row['name'] ?> akan dihapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <br>
    </div>
    <?php
    include('layouts/footer.php');
    ?>