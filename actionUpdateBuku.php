<?php
include('server/connection.php');

$id = $_GET['id_buku'];
$judul = $_POST['judul_buku'];
$penulis = $_POST['penulis_buku'];
$penerbit = $_POST['penerbit_buku'];
$tahunTerbit = $_POST['tahun_terbit'];

$query = "UPDATE buku SET judul_buku = '$judul', penulis_buku = '$penulis', penerbit_buku = '$penerbit', tahun_terbit = '$tahunTerbit' WHERE id_buku = '$id'";
mysqli_query($conn, $query);

header("location:index.php");
die();
