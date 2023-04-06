<?php
include('server/connection.php');

$id = $_GET['id_buku'];
$judul = $_POST['judul_buku'];
$penulis = $_POST['penulis_buku'];
$penerbit = $_POST['penerbit_buku'];
$tahunTerbit = $_POST['tahun_terbit'];

$cover_buku = mt_rand() . str_replace(' ', '', $judul) . ".jpg";
$path = 'img/book/' . $_SESSION['user_photo'];


if (!empty($_FILES['photo']['tmp_name'])) {
    if (file_exists($path) && $_SESSION['cover_buku'] != 'member.jpg') {
        unlink($path);
    }
    $cover = $_FILES['photo']['tmp_name'];
    move_uploaded_file($cover, "img/book/" . $cover_buku);
} else {
    $cover_buku =  $_SESSION['cover_buku'];
}

$query = "UPDATE buku SET judul_buku = '$judul', penulis_buku = '$penulis', penerbit_buku = '$penerbit', tahun_terbit = '$tahunTerbit', cover_buku = '$cover_buku' WHERE id_buku = '$id'";
mysqli_query($conn, $query);

header("location:index.php");
die();
