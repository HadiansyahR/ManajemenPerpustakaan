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
$_POST['profil'] = 'profil.php';
$_POST['buku'] = 'user.php';
include('layouts/header.php');
?>
<div class="container" id="block">
    <br><br>
    <div class="search">
        <form class="search ml-200 " action="" method="post">
            <input type="text" name="keyword" placeholder="Masukan Judul Buku">
            <button type="submit" class="btn btn-success" name="cari">Cari</button>
        </form>
    </div>
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
<?php
include('layouts/footer.php');
?>