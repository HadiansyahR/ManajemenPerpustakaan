<?php
include('server/connection.php');

$username = $_POST['user_name'];
$email = $_POST['user_email'];
$password = ($_POST['user_password']);
// $kelamin = $_POST['jenis_kelamin'];
// $alamat = $_POST['user_address'];

$query = "INSERT INTO member VALUES('','$email','$username','$password','','Member','','')";

mysqli_query($conn, $query);

header("location:login.php");
die();
