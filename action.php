<?php
include('server/connection.php');

$username = $_POST['user_name'];
$email = $_POST['user_email'];
$password = ($_POST['user_password']);

$query = "INSERT INTO member VALUES('','$email','$username','$password','','Member','','')";

mysqli_query($conn, $query);

header("location:register.html");
die();
