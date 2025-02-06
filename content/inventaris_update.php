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
$jenis      = $_POST['jenis_barang'];

$error = "";

$query  = "UPDATE datainventaris ";
$query .= "JOIN jenis ON datainventaris.kodeBarang = jenis.jenisBarang SET " ;
$query .= "datainventaris.namaBarang = '$nama_barang', ";
$query .= "datainventaris.harga = '$harga', ";
$query .= "datainventaris.kondisiBarang = '$kondisi_barang', ";
$query .= "jenis.jenisBarang = '$jenis', ";
$query .= "datainventaris.Deskripsi = '$ket' ";
$query .= "WHERE datainventaris.kodeBarang = '$kode_barang';";

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