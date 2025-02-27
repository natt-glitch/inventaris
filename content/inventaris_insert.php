<?php
if(!defined('INDEX')) die();


$kode   = $_POST['kode'];
$kd   = $_POST['kodeBarang'];
$nama_barang   = $_POST['nama_barang'];
$harga      = $_POST['harga'];
$kondisi_barang = $_POST['kondisi_barang'];
$ket        = $_POST['keterangan'];
$jenis      = $_POST['jenisBarang'];
$jumlah     = $_POST['jumlah'];

$query  = "INSERT INTO datainventaris ";
$query .= "(kodeBarang, namaBarang, harga, kondisiBarang, keterangan, jumlah) ";
$query .= "values ('$kd', '$nama_barang', $harga, '$kondisi_barang', '$ket', '$jumlah') ";
// $query .= "harga = '$harga', ";
// $query .= "kondisiBarang = '$kondisi_barang', ";
// $query .= "Deskripsi = '$ket'";
// $query .= "WHERE id = '$id'";
// var_dump($query);
// mysqli_close($con);
$result = mysqli_query($con,$query);
$hasil = mysqli_affected_rows($con);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = trim($_POST['nama_barang']);
    $kondisi_barang = trim($_POST['kondisi_barang']);
    $keterangan = trim($_POST['keterangan']);

    if ($nama_barang === "" || $kondisi_barang === "" || $keterangan === "") {
        die("Input tidak boleh hanya berisi spasi!");
    }

    // Jika lolos validasi, lanjut proses insert ke database
    // Misal:
    // $query = "INSERT INTO inventaris (nama_barang, kondisi_barang, keterangan) VALUES ('$nama_barang', '$kondisi_barang', '$keterangan')";
    // mysqli_query($con, $query);
}

if ($hasil > 0){
    echo "Berhasil menambah data barang <b>$nama_barang</b>";
    echo "<meta http-equiv='refresh' content='2; url=?hal=inventaris'>";
} else {
    echo "Tidak ada data yang di perbaharui '-' !<br>";
    echo "<meta http-equiv='refresh' content='2; url=?hal=inventaris'>";
    echo mysqli_error($con);
}
?>