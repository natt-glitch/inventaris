<?php
    if (!defined('INDEX')) die();

    $halaman = [
        "dashboard_admin",
        "dashboard_user",
        "pegawai",
        "inventaris_tambah",
        "inventaris_insert",
        "inventaris_edit",
        "inventaris_update",
        "inventaris_hapus",
        "peminjam",
        "pengembalian",
        "pengembalian_proses",
        "peminjam_tambah",
        "peminjam_insert",
        "peminjam_back",
        "peminjam_kembali",
        "data_peminjam",
        "peminjam_update",
        "peminjam_hapus",
        "peminjaman",
        "inventaris",
        "pinjam",
        "coba"
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
