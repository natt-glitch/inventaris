<?php
session_start();
ob_start();

include "library/config.php";

if (empty($_SESSION['username']) OR empty($_SESSION['password'])) {
    // echo "<p align='center'>Anda harus login terlebih dahulu!</p>";
    echo "<meta http-equiv='refresh' content='0; url=login.php'>";
} else {
    define('INDEX', true);


    // Default title
    $title = "Aplikasi Inventaris & Peminjaman Barang";

    // Cek apakah parameter 'hal' tersedia
    if (!empty($_GET['hal'])) {
        switch ($_GET['hal']) {
            case "dashboard_admin":
                $title = "Dashboard Admin";
                break;
            case "inventaris":
                $title = "Data Inventaris";
                break;
            case "inventaris_tambah":
                $title = "Tambah Barang";
                break;
            case "inventaris_update":
                $title = "Update Barang";   
                break;
            case "data_peminjam":
                $title = "Data Peminjam";
                break;
            default:
                $title = "Aplikasi Data Inventaris & Peminjaman Barang";
                break;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Link rel="stylesheet" href="css/style1.css">
    <link rel="icon" type="image/png" href="gambar/logo.png">
</head>
<body>
    <header>
        <img  class="bg" src="gambar/logo.png" alt=""> 
        Aplikasi Inventaris & Peminjaman Barang
    </header>
    <div class="container">
        <aside>
            <ul class="menu">
                <li><a href="?hal=dashboard_admin">Dashboard</a></li>
                <li><a href="?hal=inventaris">Data Inventaris</a></li>
                <li><a href="?hal=inventaris_tambah">Tambah Barang</a></li>
                <li><a href="?hal=data_peminjam">Data Peminjam</a></li>
                <li><a href="daftar.php">Daftar User</a></li>
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