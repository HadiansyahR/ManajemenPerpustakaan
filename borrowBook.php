<?php
session_start();
include('server/connection.php');

$book_id = $_SESSION['book_id'];
$user_id = $_SESSION['user_id'];
$borrow_date = date('Y-m-d');

$query = "INSERT INTO meminjam VALUES('',$user_id,$book_id,'$borrow_date')";

mysqli_query($conn, $query);

header("location:user.php");
die();
