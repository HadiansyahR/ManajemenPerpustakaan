<?php
session_start();
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
    <link rel="stylesheet" href="./css/editdata.css">
    <title>Tambah Buku</title>
    <link rel="shortcut icon" href="./icon/tabicon.png" type="image/x-icon">
</head>

<body>
    <div class="wrapper">
        <header>
            <a class="logo" href="./index.php"><img src="icon/22.png" alt=""></a>
            <a class="atr" href="./index.php?logout=1"><img src="icon/logoff.png" alt=""></a>
        </header>
        <main>
            <form id="up" method="post" action="TambahBuku.php" enctype="multipart/form-data">
                <h1>Tambah <span>BUKU</span></h1>
                <div class="update">
                    <label for="judul"><span>Judul buku:</span> <input type="text" id="judul" name="judul_buku"></label>
                    <label for="penulis"><span>Penulis:</span> <input type="text" id="penulis" name="penulis_buku"></label>
                    <label for="penerbit"><span>Penerbit:</span> <input type="text" id="penerbit" name="penerbit_buku"></label>
                    <label for="tahun"><span>Tahun Terbit:</span> <input type="text" id="tahun" name="tahun_terbit"></label>
                    <label for="tahun"><span>Cover Buku:</span> <input type="file" id="tahun" name="cover"></label>
                </div>
                <input type="submit" value="TAMBAH">
                <a href="./index.php">Kembali ke laman tabel?</a>
            </form>
            <div class="picture">
                <img class="picture" src="img/sampleprofileimage.jpg" alt="">
            </div>
        </main>
    </div>
</body>

</html>