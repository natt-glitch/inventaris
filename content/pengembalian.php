<?php
include 'library/config.php';

if (isset($_GET['id'])) {
    $kodePeminjam = mysqli_real_escape_string($con, $_GET['id']);

    // Cek apakah kode peminjam ada di database
    $cek = mysqli_query($con, "SELECT * FROM peminjam WHERE kodePeminjam = '$kodePeminjam'");
    if (mysqli_num_rows($cek) > 0) {

        // Mulai transaksi untuk menjaga konsistensi data
        mysqli_begin_transaction($con);

        try {
            // Ambil data barang yang dipinjam beserta namaBarang
            $queryDetail = "SELECT i.namaBarang, d.jumlah 
                            FROM detail_peminjaman d
                            JOIN dataInventaris i ON d.idBarang = i.id
                            WHERE d.kodePeminjam = '$kodePeminjam'";
            $resultDetail = mysqli_query($con, $queryDetail);

            if (mysqli_num_rows($resultDetail) > 0) {
                while ($row = mysqli_fetch_assoc($resultDetail)) {
                    $namaBarang = mysqli_real_escape_string($con, $row['namaBarang']);
                    $jumlahDikembalikan = $row['jumlah'];

                    // Debugging: tampilkan namaBarang dan jumlah
                    echo "Nama Barang: $namaBarang, Jumlah Dikembalikan: $jumlahDikembalikan<br>";

                    // Cek apakah barang ada di dataInventaris sebelum update
                    $cekBarang = mysqli_query($con, "SELECT * FROM dataInventaris WHERE namaBarang = '$namaBarang'");
                    if (mysqli_num_rows($cekBarang) > 0) {
                        // Update stok barang di tabel dataInventaris berdasarkan namaBarang
                        $queryUpdateStok = "UPDATE dataInventaris SET jumlah = jumlah + $jumlahDikembalikan WHERE namaBarang = '$namaBarang'";
                        $resultUpdateStok = mysqli_query($con, $queryUpdateStok);

                        if (!$resultUpdateStok) {
                            throw new Exception("Gagal memperbarui stok barang: " . mysqli_error($con));
                        }
                    } else {
                        throw new Exception("Nama Barang '$namaBarang' tidak ditemukan di dataInventaris!");
                    }
                }
            } else {
                throw new Exception("Tidak ada barang yang dipinjam untuk kode peminjam: $kodePeminjam");
            }

            // Update waktu pengembalian di tabel peminjam
            $queryUpdatePeminjam = "UPDATE peminjam SET jamKembali = NOW() WHERE kodePeminjam = '$kodePeminjam'";
            $resultUpdatePeminjam = mysqli_query($con, $queryUpdatePeminjam);

            if (!$resultUpdatePeminjam) {
                throw new Exception("Gagal memperbarui waktu pengembalian: " . mysqli_error($con));
            }

            // Commit transaksi jika semua berjalan lancar
            mysqli_commit($con);

            echo "<script>alert('Barang berhasil dikembalikan dan stok diperbarui!'); window.location='index.php?hal=data_peminjam';</script>";
        } catch (Exception $e) {
            // Rollback jika ada kesalahan
            mysqli_rollback($con);
            echo "<script>alert('" . $e->getMessage() . "');</script>";
        }
    } else {
        // Jika kode peminjam tidak ditemukan
        echo "<script>alert('Kode peminjam tidak ditemukan!'); window.location='index.php?hal=data_peminjam';</script>";
    }
}
?>
