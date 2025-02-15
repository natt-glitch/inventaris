<?php
    if (!defined('INDEX')) die(""); 
?>

<h2 class="judul">Data Barang Yang Bisa Dipinjam</h2>

<table class="table">
    <thead>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jenis</th>
        <th>Kondisi</th>
        <th>Stok</th>
        <th>Aksi</th>
    </thead>
    <tbody>
<?php
$id = $_GET['id']; 
$query = "SELECT datainventaris.namaBarang, jenis.jenisBarang, datainventaris.keterangan, datainventaris.stok 
FROM datainventaris 
LEFT JOIN jenis ON datainventaris.kodeBarang = jenis.kodeBarang 
ORDER BY datainventaris.kodeBarang DESC";

$result = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($result)) {
    echo "<label>
            <input type='checkbox' name='id_barang[]' value='{$data['id']}'>
            {$data['namaBarang']} ({$data['jenisBarang']})
          </label><br>"; $no++;
?>
<tr>
    <td><?=$no;?></td>
    <td><?=$data['namaBarang']?></td>
    <td><?=$data['jenisBarang']?></td>
    <td><?=$data['keterangan']?></td>
    <td><?=$data['stok']?></td>
    <td>
    </td>
</tr>

    </tbody>
    <?php
}
?>
</table>
