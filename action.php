<?php
include('server/connection.php');

$username = $_POST['user_name'];
$email = $_POST['user_email'];
$password = ($_POST['user_password']);
$telp = ($_POST['telephone']);

if (isset($_POST['photo'])) {
    $photo = $_FILES['photo']['tmp_name'];
    $photo_name = str_replace(' ', '_', $username) . ".jpg";
    move_uploaded_file($photo, "img/profil/" . $photo_name);
} else {
    $photo_name =  'member.jpg';
}



$query = "INSERT INTO akun VALUES('','$email','$username','$password','$telp','User','$photo_name')";

mysqli_query($conn, $query);

header("location:login.php");
die();
