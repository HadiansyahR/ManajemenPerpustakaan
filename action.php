<?php
include('server/connection.php');

$username = $_POST['user_name'];
$email = $_POST['user_email'];
$password = ($_POST['user_password']);
$photo = str_replace(' ', '_', $username) . ".jpg";
// tet
$query = "INSERT INTO akun VALUES('','$email','$username','$password','User','$photo')";

mysqli_query($conn, $query);

header("location:login.php");
die();
