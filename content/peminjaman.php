<?php
include 'library/config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $namaPeminjam = mysqli_real_escape_string($con, $_POST['nama_peminjam']);

    // Generate Kode Peminjam Unik
    $kodePeminjam = "PJM" . time();

    // Simpan Data Peminjam
    $queryPeminjam = "INSERT INTO peminjam (kodePeminjam, namaPeminjam, jamPinjam) VALUES ('$kodePeminjam', '$namaPeminjam', NOW())";
    mysqli_query($con, $queryPeminjam);

    // Simpan Barang yang Dipilih ke detail_peminjaman
    foreach ($_POST['id_barang'] as $idBarang) {
        $jumlahPinjam = $_POST['jumlah'][$idBarang];

        // Buat kode transaksi barang (unik untuk tiap barang dalam transaksi)
        $kodeTransaksi = $kodePeminjam . "-" . $idBarang;

        $queryDetail = "INSERT INTO detail_peminjaman (kodeTransaksi, kodePeminjam, idBarang, jumlah, status) 
                        VALUES ('$kodeTransaksi', '$kodePeminjam', '$idBarang', '$jumlahPinjam', 'Dipinjam')";
        mysqli_query($con, $queryDetail);

        // Kurangi stok barang
        $queryUpdateStok = "UPDATE dataInventaris SET jumlah = jumlah - $jumlahPinjam WHERE id = '$idBarang'";
        mysqli_query($con, $queryUpdateStok);
    }

    echo "<script>alert('Peminjaman berhasil!'); window.location='index.php?hal=coba';</script>";
}
?>