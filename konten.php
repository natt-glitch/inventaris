<?php
    if (!defined('INDEX')) die();

    $halaman = [
        "dashboard",
        "pegawai",
        "inventaris_tambah",
        "inventaris_insert",
        "inventaris_edit",
        "inventaris_update",
        "pegawai_hapus",
        "jabatan",
        "jabatan_tambah",
        "jabatan_insert",
        "jabatan_edit",
        "jabatan_update",
        "jabatan_hapus",
        "inventaris"
    ];

    if (isset($_GET['hal'])) { //untuk mengecek apakah ada parameter GET yang dikirim
        $hal = $_GET['hal']; //jika ada maka akan disimpan dalam variabel $hal
    } else {
        $hal = 'dashboard'; //jika tidak ada maka halaman yang akan ditampilkan adalah halaman dashboard
    }

    foreach($halaman as $h){ //melakukan perulangan untuk mengecek apakah parameter GET yang dikirim ada dalam array $halaman
        if($hal == $h){
            include "content/$h.php"; //jika ada maka akan memanggil file yang ada dalam folder content
            break;
        }
    }
?>
