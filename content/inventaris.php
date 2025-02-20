<?php
    if (!defined('INDEX')) die(""); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Inventaris</title>
</head>
<body>
<h2 class="judul">Data Inventaris</h2>

<form method="GET" style="margin: 10px 0;">
    <input type="hidden" name="hal" value="inventaris">
    <input type="text" name="search" placeholder="Cari Nama Barang..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
    <button class="tombol edit" type="submit">Cari</button>
</form>

<table class="table">
    <thead>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga Beli</th>
        <th>Jenis</th>
        <th>Kondisi</th>
        <th>Keterangan</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </thead>
    <tbody>
<?php
$search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
$query = "SELECT * FROM datainventaris "; 
$query .= "LEFT JOIN jenis ON datainventaris.kodeBarang = jenis.kodeBarang "; 
if ($search) {
    $query .= "WHERE datainventaris.namaBarang LIKE '%$search%' ";
}
$query .= "ORDER BY datainventaris.kodeBarang DESC";

$result = mysqli_query($con, $query); 
$no = 0;

while ($data = mysqli_fetch_assoc($result)) { 
    $no++;
?>
<tr>
    <td><?=$no;?></td>
    <td><?=$data['kodeBarang']?></td>
    <td><?=$data['namaBarang']?></td>
    <td><?=$data['harga']?></td>
    <td><?=$data['jenisBarang']?></td>
    <td><?=$data['kondisiBarang']?></td>
    <td><?=$data['keterangan']?></td>
    <td><?=$data['jumlah']?></td>
    <td style="display: flex; gap: 5px;">
        <a href="?hal=inventaris_edit&id=<?=$data['id']?>" class="tombol edit">Edit</a>
        <a href="?hal=inventaris_hapus&id=<?=$data['id']?>" class="tombol hapus">Hapus</a>
    </td>
</tr>
<?php
}
?>
    </tbody>
</table>
</body>
</html>

