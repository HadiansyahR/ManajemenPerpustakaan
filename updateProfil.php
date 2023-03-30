<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}
$_POST['profil'] = 'profil.php';
$_POST['buku'] = 'user.php';
include('layouts/header.php');
$id = $_SESSION["user_id"]; ?>

<div class="container">
    <div class="block">
        <br>
        <br>
    </div>
    <form method="post" action="actionUpdate.php?user_id=<?php echo $id ?>">
        <br>
        <h3>UPDATE Profil</h3>
        <h6 class="mb-3">ID: <?php echo $_SESSION['user_id']; ?> </h6>
        <h6>Email:</h6>
        <div class="input">
            <input type="text" name="user_email" value="<?php echo $_SESSION['user_email'] ?>">
            <i class="bx bx-user"></i>
        </div>
        <h6>Nama :</h6>
        <div class="input">
            <input type="text" name="user_name" value="<?php echo $_SESSION['user_name'] ?>">
            <i class="bx bx-envelope"></i>
        </div>
        <br>
        <span>
            <button name="button" type="submit" class="contoh btn btn-success">UPDATE</button>
        </span>
    </form>
</div>
<?php
include('layouts/footer.php');
?>