<?php
session_start();
include('server/connection.php');
$id = $_SESSION['user_id'];
$sql = "Select * from akun WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_email'] = $row['email'];
}
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}
$_POST['profil'] = 'profil.php';
$_POST['buku'] = 'user.php';
include('layouts/header.php');
?>

<div class="container form" id="block">
    <h3>PROFIL</h3>
    <br>
    <img class="rounded-circle img-responsive" width="200px" src="img/profil/<?php echo  $row['photo']  ?>" alt="Profil <?php echo  $row['user_name']  ?>">
    <br><br>
    <h6>ID: <?php echo $row['id']; ?></h6>
    <h6>Nama: <?php echo $row['name']; ?></h6>
    <h6>Email: <?php echo $row['email']; ?></h6>
    <h6>Status: <?php echo $row['status']; ?></h6>
    <br>
    <a class=" btn btn-success mr-10" href="updateProfil.php" role="button">Update</a>
</div>
<?php
include('layouts/footer.php');
?>