<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}
$_POST['profil'] = 'dataProfil.php';
$_POST['buku'] = 'index.php';
include('layouts/header.php');
$id = $_GET["id_buku"]; ?>

<div class="container2">
    <div class="block">
        <br>
        <br>
    </div>
    <form method="post" action="actionUpdateBuku.php?id_buku=<?php echo $id ?>">
        <br>
        <h3>UPDATE BUKU</h3>
        <h6 class="mb-3">ID BUKU: <?php echo $_GET['id_buku']; ?> </h6>
        <h6>Judul Buku :</h6>
        <div class="input">
            <input type="text" name="judul_buku" value="<?php echo $_GET['judul_buku'] ?>">
            <i class="bx bx-user"></i>
        </div>
        <h6>Penulis :</h6>
        <div class="input">
            <input type="text" name="penulis_buku" value="<?php echo $_GET['penulis_buku'] ?>">
            <i class="bx bx-envelope"></i>
        </div>
        <h6>Penerbit :</h6>
        <div class="input">
            <input type="text" name="penerbit_buku" value="<?php echo $_GET['penerbit_buku'] ?>">
            <i class="bx bx-envelope"></i>
        </div>
        <h6>Tahun Terbit :</h6>
        <div class="input">
            <input type="text" name="tahun_terbit" value="<?php echo $_GET['tahun_terbit'] ?>">
            <i class="bx bx-envelope"></i>
        </div>
        <br>
        <span>
            <button name="button" type="submit" class="contoh btn btn-success">UPDATE</button>
            <a class=" btn btn-secondary mr-10" href="index.php" role="button">Kembali</a>
        </span>
    </form>
</div>
<?php
include('layouts/header.php');
?>