<?php
include('server/connection.php');

$book_id = $_POST['book_id'];
$user_id = $_POST['user_id'];
$borrow_date = date('Y-m-d');

$query = "INSERT INTO peminjaman VALUES('','$user_id','$book_id','$borrow_date')";

mysqli_query($conn, $query);

header("location:user.php");
die();
