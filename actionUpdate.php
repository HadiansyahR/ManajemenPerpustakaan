<?php

include "server/connection.php";
$id = $_GET['id'];
$email = $_POST['user_email'];
$telp = $_POST['user_telp'];
$password = $_POST['user_password'];
$name = $_POST['user_name'];

$query = "UPDATE akun SET email = '$email', name = '$name', telephone = '$telp', password = '$password' WHERE id = '$id'";
mysqli_query($conn, $query);
header("location:profil.php");
die();
