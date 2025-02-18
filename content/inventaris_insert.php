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

if ($hasil > 0){
    echo "Berhasil menambah data barang <b>$nama_barang</b>";
    echo "<meta http-equiv='refresh' content='2; url=?hal=inventaris'>";
} else {
    echo "Tidak ada data yang di perbaharui '-' !<br>";
    echo "<meta http-equiv='refresh' content='2; url=?hal=inventaris'>";
    echo mysqli_error($con);
}
?>