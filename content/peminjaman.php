<?php
include 'library/config.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_peminjam = $_POST['nama_peminjam']; 
    $id_barang_list = isset($_POST['id_barang']) ? $_POST['id_barang'] : []; 
    $jumlah_list = isset($_POST['jumlah']) ? $_POST['jumlah'] : []; 

    if (!empty($id_barang_list)) {
        // Buat kodePeminjam hanya sekali untuk semua barang yang dipinjam
        $kodePeminjam = "PMJ-" . rand(1000, 9999);

        // Simpan peminjaman ke tabel `peminjam`
        $query = "INSERT INTO peminjam (kodePeminjam, namaPeminjam, jamPinjam, jamKembali) 
                  VALUES (?, ?, CURRENT_TIME(), NULL)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ss", $kodePeminjam, $nama_peminjam);

        if (!$stmt->execute()) {
            die("Error Insert Peminjam: " . $stmt->error);
        }

        // Simpan setiap barang yang dipinjam ke tabel `detail_peminjaman`
        foreach ($id_barang_list as $id_barang) {
            $jumlah_pinjam = isset($jumlah_list[$id_barang]) ? intval($jumlah_list[$id_barang]) : 1;

            // Kurangi stok barang sesuai jumlah yang dipinjam
            $update_query = "UPDATE dataInventaris SET jumlah = jumlah - ? WHERE id = ?";
            $stmt_update = $con->prepare($update_query);
            $stmt_update->bind_param("ii", $jumlah_pinjam, $id_barang);
            if (!$stmt_update->execute()) {
                die("Error Update Stok: " . $stmt_update->error);
            }

            // Simpan detail peminjaman
            $insert_detail = "INSERT INTO detail_peminjaman (kodePeminjam, idBarang, jumlah) VALUES (?, ?, ?)";
            $stmt_detail = $con->prepare($insert_detail);
            $stmt_detail->bind_param("sii", $kodePeminjam, $id_barang, $jumlah_pinjam);

            if (!$stmt_detail->execute()) {
                die("Error Insert Detail: " . $stmt_detail->error);
            }
        }

        echo "Peminjaman berhasil! Kode Peminjam: $kodePeminjam<br>";
        echo "<meta http-equiv='refresh' content='2; url=?hal=pinjam'>";
    } else {
        echo "Pilih setidaknya satu barang untuk dipinjam.";
    }
}
?>
