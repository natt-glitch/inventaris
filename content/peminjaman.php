<?php
include 'library/config.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_peminjam = $_POST['nama_peminjam']; 
    $id_barang_list = isset($_POST['id_barang']) ? $_POST['id_barang'] : []; 

    if (!empty($id_barang_list)) {
        foreach ($id_barang_list as $id_barang) {
            // Kurangi stok barang
            $update_query = "UPDATE dataInventaris SET stok = stok - 1 WHERE id = $id_barang";
            if (!$con->query($update_query)) {
                die("Error Update Stok: " . $con->error);
            }

            // Buat kodePeminjam (bisa disesuaikan formatnya)
            $kodePeminjam = "PMJ-" . rand(1000, 9999);

            // Simpan peminjaman ke tabel `peminjam`
            $query = "INSERT INTO peminjam (kodePeminjam, namaPeminjam, jamPinjam, jamKembali) 
                      VALUES (?, ?, CURRENT_TIME(), NULL)";

            $stmt = $con->prepare($query);
            $stmt->bind_param("ss", $kodePeminjam, $nama_peminjam);

            if (!$stmt->execute()) {
                die("Error Insert Peminjam: " . $stmt->error);
            }

            echo "Peminjaman berhasil! Kode Peminjam: $kodePeminjam<br>";
        }
    } else {
        echo "Pilih setidaknya satu barang untuk dipinjam.";
    }
}
$hasil = mysqli_affected_rows($con);
var_dump($hasil);

if ($hasil > 0){
    echo "Berhasil meminjam barang";
    echo "<meta http-equiv='refresh' content='2; url=?hal=coba'>";
} else {
    echo "Tidak ada data yang di perbaharui '-' !<br>";
    echo "<meta http-equiv='refresh' content='2; url=?hal=coba'>";
    echo mysqli_error($con);
}
?>
