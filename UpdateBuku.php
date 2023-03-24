<?php
include('server/connection.php');

$id = $_GET['id_buku'];
$judul = $_GET['judul_buku'];
$penulis = $_GET['penulis_buku'];
$penerbit = $_GET['penerbit_buku'];
$tahunTerbit = $_GET['tahun_terbit'];

$query = "UPDATE buku SET judul_buku = '$judul', penulis_buku = '$penulis', penerbit_buku = '$penerbit', tahun_terbit = '$tahunTerbit' WHERE id_buku = '$id'";
mysqli_query($conn, $query);

header("location:index.php");
die();
