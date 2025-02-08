<?php
if(!defined('INDEX')) die();

$kode   = $_POST['kode'];
$nama_barang   = $_POST['nama_barang'];
$harga      = $_POST['harga'];
$kondisi_barang = $_POST['kondisi_barang'];
$ket        = $_POST['keterangan'];
$jenis      = $_POST['jenis_barang'];

$query  = "INSERT INTO datainventaris ";
$query .= "(namaBarang, harga, kondisiBarang, Deskripsi) ";
$query .= "values ($nama_barang, $harga, $kondisi_barang, $ket) ";
// $query .= "harga = '$harga', ";
// $query .= "kondisiBarang = '$kondisi_barang', ";
// $query .= "Deskripsi = '$ket'";
// $query .= "WHERE kodeBarang = '$kode'";

$result = mysqli_query($con,$query);
$hasil = mysqli_affected_rows($con);


if ($hasil > 0){
    echo "Berhasil memperbaharui data barang <b>$nama_barang</b>";
    echo "<meta http-equiv='refresh' content='2; url=?hal=inventaris'>";
} else {
    echo "Tidak ada data yang di perbaharui '-' !<br>";
    echo "<meta http-equiv='refresh' content='2; url=?hal=inventaris'>";
    echo mysqli_error($con);
}
?>