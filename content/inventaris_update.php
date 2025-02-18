<?php
if(!defined('INDEX')) die();


// $foto   = $_FILES['foto']['name'];
// $lokasi = $_FILES['foto']['tmp_name'];
// $tipe   = $_FILES['foto']['type'];
// $ukuran = $_FILES['foto']['size'];

$id = intval($_POST['id']); 
$nama_barang   = $_POST['nama_barang'];
$jenis_barang   = $_POST['jenis_barang'];
$kode_barang   = $_POST['kode_barang'];
$harga      = floatval($_POST['harga']);
$kondisi_barang = $_POST['kondisi_barang'];
$ket        = $_POST['keterangan'];
$jumlah        = intval($_POST['jumlah']);
$jenis      = $_POST['jenis_barang'];


// $query  = "UPDATE datainventaris ";
// $query .= "JOIN jenis ON datainventaris.kodeBarang = jenis.jenisBarang SET " ;
// $query .= "datainventaris.namaBarang = '$nama_barang', ";
// $query .= "datainventaris.harga = '$harga', ";
// $query .= "datainventaris.kondisiBarang = '$kondisi_barang', ";
// $query .= "jenis.jenisBarang = '$jenis', ";
// $query .= "datainventaris.Deskripsi = '$ket' ";
// $query .= "WHERE datainventaris.kodeBarang = '$kode_barang';";

//     $result = mysqli_query($con,$query);
    
$query  = "UPDATE datainventaris SET ";
$query .= "kodeBarang = '$kode_barang', ";
$query .= "namaBarang = '$nama_barang', ";
$query .= "harga = '$harga', ";
$query .= "kondisiBarang = '$kondisi_barang', ";
$query .= "keterangan = '$ket', ";
$query .= "jumlah = '$jumlah' ";
$query .= "WHERE id = '$id'";
// var_dump($nama_barang, $kode_barang, $harga, $kondisi_barang, $ket, $id, $stok);
// exit(); // Hentikan eksekusi sementara untuk debugging

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