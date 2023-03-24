<?php

include "server/connection.php";
$id = $_GET['user_id'];
$email = $_POST['user_email'];
$name = $_POST['user_name'];
$kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['user_address'];

$query = "UPDATE member SET user_email = '$email', user_name = '$name', jenis_kelamin = '$kelamin', user_address = '$alamat' WHERE user_id = '$id'";
mysqli_query($conn, $query);
header("location:index.php");
die();
