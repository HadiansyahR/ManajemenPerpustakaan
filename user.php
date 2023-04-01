<?php
session_start();
include('server/connection.php');

$sql = "Select * from buku";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $q = "Select * from buku where judul_buku LIKE '%$keyword%'";
} else {
    $q = 'Select * from buku';
}

$result = mysqli_query($conn, $q);

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        header('location: login.php');
        exit;
    }
}

$name = $row['judul_buku'];
$photo_name = str_replace(' ', '_', $name) . ".jpg";
$_POST['profil'] = 'profil.php';
$_POST['buku'] = 'user.php';

?>
<head>
    <?php
        include('layouts/header.php');
    ?>
</head>
<body>
    
    <div class="container" id="block">
        <div class="search">
            <form class="search ml-200 " action="" method="post">
                <input type="text" name="keyword" placeholder="Masukan Judul Buku">
                <button type="submit" class="btn btn-primary" name="cari">Cari</button>
            </form>
        </div>
        
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<form method="post" action="borrowBook.php">';
                    
                    echo '<div class="card">';

                    echo '<input type="hidden" name="book_id" value="'. $row['id_buku'] . '">';
                    echo '<input type="hidden" name="user_id" value="'. $_SESSION['user_id'] . '">';
                    echo '<img src="img/book/' . $row['cover_buku'] . '" alt="' . $row['judul_buku'] . '">';
                    echo '<h3>' . $row['judul_buku'] . '</h3>';
                    echo '<p>' . $row['penulis_buku'] . '</p>';
                    echo '<br><br>';
                    echo '<button type="submit" class="btn btn-primary">Pinjam</button>';

                    echo '</div>';

                    echo '</form>';
                }
            ?>
        
    </div>
    
</body>

<?php
include('layouts/footer.php');
?>