<?php
if(!defined('INDEX')) die();

// $foto   = $_FILES['foto']['name'];
// $lokasi = $_FILES['foto']['tmp_name'];
// $tipe   = $_FILES['foto']['type'];
// $ukuran = $_FILES['foto']['size'];

$kode_barang   = $_POST['kode_barang'];
$nama_barang   = $_POST['nama_barang'];
$harga      = $_POST['harga'];
$kondisi_barang = $_POST['kondisi_barang'];
$ket        = $_POST['keterangan'];
$jenis      = $_POST['jenis'];

$error = "";

$query  = "UPDATE datainventaris ";
$query .= "LEFT JOIN jenis  ON jenisBarang = kode SET ";
$query .= "namaBarang = '$nama_barang', ";
$query .= "harga = '$harga', ";
$query .= "kondisiBarang = '$kondisi_barang', ";
$query .= "jenis = '$jenis', ";
$query .= "keterangan = '$ket' ";
$query .= "WHERE kodeBarang = '$kode_barang'";

    $result = mysqli_query($con,$query);
    
if($error != ""){
    echo $error;
    echo "<meta http-equiv='refresh' content='2; url=?hal=inventaris_edit'>";
} elseif ($query){
    echo "Berhasil memperbaharui data barang <b>$nama_barang</b>";
    echo "<meta http-equiv='refresh' content='1; url=?hal=inventaris'>";
} else {
    echo "Tidak dapat menyimpan data!<br>";
    echo mysqli_error($con);
}
?>