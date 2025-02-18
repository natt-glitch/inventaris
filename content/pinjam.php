<?php
if (!defined('INDEX')) die(""); 
?>

<h2 class="judul">Data Inventaris</h2>
<a href="?hal=coba" class="tombol edit">Pinjam Barang</a>
<table class="table">
    <thead>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jenis</th>
        <th>Kondisi</th>
        <th>Keterangan</th>
        <th>jumlah</th>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM datainventaris 
          LEFT JOIN jenis 
          ON datainventaris.kodeBarang = jenis.kodeBarang 
          ORDER BY datainventaris.kodeBarang DESC"; 

$result = mysqli_query($con, $query); 
$no = 0;
$tombolDitampilkan = false; // Variabel untuk memastikan tombol hanya muncul sekali

while ($data = mysqli_fetch_assoc($result)) { 
    $no++;
?>
<tr>
    <td><?=$no;?></td>
    <td><?=$data['namaBarang']?></td>
    <td><?=$data['jenisBarang']?></td>
    <td><?=$data['kondisiBarang']?></td>
    <td><?=$data['keterangan']?></td>
    <td><?=$data['jumlah']?></td>

</tr>
<?php 
}
?>
    </tbody>
</table>
