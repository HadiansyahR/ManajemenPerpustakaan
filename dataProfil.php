<?php
session_start();
include('server/connection.php');

$sql = "Select * from buku";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $q = "Select * from buku where judul_buku LIKE '%$keyword%'";
} else {
    $q = 'Select * from buku';
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

$name = $row['judul_buku'];
$photo_name = str_replace(' ', '_', $name) . ".jpg";

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
                <input type="text" name="keyword" placeholder="Masukan Judul Buku">
                <button type="submit" class="btn btn-success" name="cari">Cari</button>
            </form>
        </div>
        <br><br>
        <br><br>
        <table class="table table-warning ">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Cover Buku</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id_buku'] ?></td>
                        <td><?php echo $row['judul_buku'] ?></td>
                        <td><?php echo $row['penulis_buku'] ?></td>
                        <td><?php echo $row['penerbit_buku'] ?></td>
                        <td><?php echo $row['tahun_terbit'] ?></td>
                        <td>
                            <img width="100" src="img/<?php echo $row['cover_buku'] ?>" alt="<?php echo $row['cover_buku'] ?>">
                        </td>
                        <td>
                            <a class="text-danger" href="DeleteBuku.php?id_buku=<?= $row['id_buku']; ?>" role="button" onclick="return confirm('Buku <?= $row['judul_buku'] ?> akan dihapus?')">Hapus</a> |
                            <a class="text-secondary" href="UpdateBuku.php?id_buku=<?= $row['id_buku']; ?>&judul_buku=<?= $row['judul_buku']; ?>&penulis_buku=<?= $row['penulis_buku']; ?>&penerbit_buku=<?= $row['penerbit_buku']; ?>&tahun_terbit=<?= $row['tahun_terbit']; ?>">Edit</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>

        <div id="center">
            <a class="btn btn-danger" href="index.php?logout=3" role="button">Log out</a>
        </div>
        <br>
        <br>
    </div>
</body>

</html>