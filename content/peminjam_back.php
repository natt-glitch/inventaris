<?php
if (!defined('INDEX')) die(""); 
include 'koneksi.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kodePeminjam = $_POST['kodePeminjam']; // Ambil kode peminjam

    // Perbarui jamKembali dengan waktu sekarang
    $query = "UPDATE peminjam SET jamKembali = CURRENT_TIME() WHERE kodePeminjam = '$kodePeminjam'";

    if ($conn->query($query)) {
        echo "Barang berhasil dikembalikan!";
    } else {
        echo "Gagal mengembalikan barang: " . $conn->error;
    }
}
?>
