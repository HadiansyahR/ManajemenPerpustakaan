<?php
$_POST['profil'] = 'dataProfil.php';
$_POST['buku'] = 'index.php';
include('layouts/header.php');
?>
<div class="container">
    <form method="post" action="TambahBuku.php">
        <h3>TAMBAH BUKU</h3>
        <h6>Judul Buku :</h6>
        <div class="input">
            <input type="text" name="judul_buku">
            <i class="bx bx-user"></i>
        </div>
        <h6>Penulis :</h6>
        <div class="input">
            <input type="text" name="penulis_buku">
            <i class="bx bx-envelope"></i>
        </div>
        <h6>Penerbit :</h6>
        <div class="input">
            <input type="text" name="penerbit_buku">
            <i class="bx bx-envelope"></i>
        </div>
        <h6>Tahun Terbit :</h6>
        <div class="input">
            <input type="text" name="tahun_terbit">
            <i class="bx bx-envelope"></i>
            <br>
            <span>
                <button type="submit" class="btn btn-success">Tambah</button>
                <a class=" btn btn-secondary mr-10" href="index.php" role="button">Kembali</a>
                <br>
            </span>
    </form>
</div>
<?php
include('layouts/footer.php');
?>