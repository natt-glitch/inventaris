<?php
    if (!defined('INDEX')) die(""); 
?>

<h2 class="judul">Data Inventaris</h2>
<a href="?hal=inventaris_tambah" class="tombol">Tambah</a>

<table class="table">
    <thead>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Harga Beli</th>
        <th>Jenis</th>
        <th>Kondisi</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </thead>
    <tbody>
<?php
$query = "SELECT * FROM datainventaris "; 
$query .= "LEFT JOIN jenis "; //untuk menggabungkan 2 tabel yaitu datainventaris dan jabatan
$query .= "ON datainventaris.kodeBarang = jenis.kodeBarang "; //menggabungkan 2 tabel berdasarkan id_jabatan
$query .= "ORDER BY datainventaris.kodeBarang DESC"; //untuk mengurutkan data berdasarkan kodebarang
$result = mysqli_query($con, $query); 
$no = 0;

while ($data = mysqli_fetch_assoc($result)) { //mengambil data dari database 
    $no++;
?>
<tr>
    <td><?=$no;?></td>
    <td><?=$data['kodeBarang']?></td>
    <td><?=$data['namaBarang']?></td> <!--mengambil data nama_pegawai dari database-->
    <td><?=$data['harga']?></td>
    <td><?=$data['jenisBarang']?></td>
    <td><?=$data['kondisiBarang']?></td>
    <td><?=$data['keterangan']?></td>
    <td>
        <a href="?hal=inventaris_edit&id=<?=$data['id']?>"
        class="tombol edit">Edit</a>
        <a href="?hal=inventaris_hapus&id=<?=$data['id']?>"
        class="tombol hapus">hapus</a> 
    </td>
</tr>

    </tbody>
    <?php
}
?>
</table>
