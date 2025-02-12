<?php
if(!defined('INDEX')) die();

$id   = $_GET['id'];


$query  = "DELETE FROM datainventaris WHERE id = '$id'";
$result = mysqli_query($con,$query);
$hasil = mysqli_affected_rows($con);

if($hasil > 0){
    echo "Data berhasil dihapus!";
    echo "<meta http-equiv='refresh' content='1; url=?hal=inventaris'>";
}else{
    echo "Tidak dapat menghapus data pegawai!<br>";
    echo mysqli_error($con);
}

?>