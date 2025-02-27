<?php
include 'library/config.php';

if (isset($_GET['kode'])) {
    $kodePeminjam = mysqli_real_escape_string($con, $_GET['kode']);

    // Mulai transaksi database
    mysqli_begin_transaction($con);

    try {
        // Ambil semua barang yang dipinjam oleh kodePeminjam
        $queryDetail = "SELECT kodeTransaksi, idBarang, jumlah FROM detail_peminjaman WHERE kodePeminjam = '$kodePeminjam' AND status = 'Dipinjam'";
        $result = mysqli_query($con, $queryDetail);

        if (mysqli_num_rows($result) == 0) {
            throw new Exception("Tidak ada barang yang sedang dipinjam oleh peminjam ini.");
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $idBarang = $row['idBarang'];
            $jumlahKembali = $row['jumlah'];
            $kodeTransaksi = $row['kodeTransaksi'];

            // Tambah stok barang yang dikembalikan
            $queryUpdateStok = "UPDATE datainventaris SET jumlah = jumlah + $jumlahKembali WHERE id = '$idBarang'";
            if (!mysqli_query($con, $queryUpdateStok)) {
                throw new Exception("Gagal memperbarui stok barang.");
            }

            // Update status peminjaman menjadi 'Kembali'
            $queryUpdateDetail = "UPDATE detail_peminjaman SET status = 'Kembali' WHERE kodeTransaksi = '$kodeTransaksi'";
            if (!mysqli_query($con, $queryUpdateDetail)) {
                throw new Exception("Gagal memperbarui status peminjaman.");
            }
        }

        // Periksa apakah semua barang telah dikembalikan
        $cekSisa = mysqli_query($con, "SELECT * FROM detail_peminjaman WHERE kodePeminjam = '$kodePeminjam' AND status = 'Dipinjam'");
        if (mysqli_num_rows($cekSisa) == 0) {
            // Jika semua barang sudah dikembalikan, perbarui jamKembali di peminjam
            $queryUpdatePeminjam = "UPDATE peminjam SET jamKembali = NOW() WHERE kodePeminjam = '$kodePeminjam'";
            if (!mysqli_query($con, $queryUpdatePeminjam)) {
                throw new Exception("Gagal memperbarui waktu pengembalian.");
            }
        }

        // Commit transaksi jika semua berhasil
        mysqli_commit($con);
        echo "<script>alert('Pengembalian berhasil, dan datainventaris diperbaharui!'); window.location='index.php?hal=data_peminjam';</script>";
    } catch (Exception $e) {
        // Rollback transaksi jika ada kesalahan
        mysqli_rollback($con);
        echo "<script>alert('" . $e->getMessage() . "'); window.location='index.php?hal=data_peminjam';</script>";
    }
}
?>
