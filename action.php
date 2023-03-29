<?php
include('server/connection.php');

$username = $_POST['user_name'];
$email = $_POST['user_email'];
$password = ($_POST['user_password']);

$photo = $_FILES['photo']['tmp_name'];
$photo_name = str_replace(' ', '_', $username) . ".jpg";

move_uploaded_file($photo, "img/profil/" . $photo_name);

$query = "INSERT INTO akun VALUES('','$email','$username','$password','User','$photo_name')";

mysqli_query($conn, $query);

header("location:login.php");
die();
