<?php
include('server/connection.php');

$id = $_GET['id_buku'];
$judul = $_POST['judul_buku'];
$penulis = $_POST['penulis_buku'];
$penerbit = $_POST['penerbit_buku'];
$coverBuku = $_POST['cover_buku'];
$tahunTerbit = $_POST['tahun_terbit'];

$query = "INSERT INTO buku VALUES('','$id','$judul','$penulis','$penerbit','$coverBuku','$tahunTerbit')";

mysqli_query($conn, $query);

header("location:index.php");
die();
