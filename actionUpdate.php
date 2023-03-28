<?php

include "server/connection.php";
$id = $_GET['user_id'];
$email = $_POST['user_email'];
$name = $_POST['user_name'];
$photo = str_replace(' ', '_', $name) . ".jpg";

$query = "UPDATE akun SET email = '$email', name = '$name', photo = '$photo' WHERE id = '$id'";
mysqli_query($conn, $query);
header("location:profil.php");
die();
