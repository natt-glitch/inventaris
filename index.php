<?php
    session_start();
    ob_start();

    include "library/config.php";

    if (empty($_SESSION['username']) OR empty($_SESSION['password'])) {
        echo "<p align='center'>Anda harus login terlebih dahulu!</p>";
        echo "<meta http-equiv='refresh' content='2; url=login.php'>";
    } else {
        define('INDEX', true);  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <header>
        Aplikasi Peminjaman Barang
    </header>
    <div class="container">
        <aside>
            <ul class="menu">
                <li><a href="?hal=dashboard">Dashboard</a></li>
                <li><a href="?hal=inventaris">Data Inventaris</a></li>
                <li><a href="?hal=inventaris_tambah">Tambah Barang</a></li>
                <li><a href="?hal=dashboard">Data Peminjam</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
        </aside>
        <section class="main">
            <?php include "konten.php" ?>
        </section> 
    </div>
    <footer>
        Made with 🤝 + 🍻 = 💝 <b>Kelompok 5 </b>
    </footer>
</body>
</html>

<?php
}
?>